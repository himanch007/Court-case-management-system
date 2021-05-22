<?php
session_start();
?>
<html>
<body>
<form method="post">
<div class="login-box">
  <h1 id="title" style="width:300px;">Lawyer Login</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" placeholder="Username" name="t1">
  </div>

  <div class="textbox" name="t2">
    <i class="fas fa-lock"></i>
    <input type="password" placeholder="Password" name="t2">
  </div>

  <input type="submit" class="btn" value="Sign in">

</form>
<style>
@import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";
section{height:100vh;
		width:100%;}
#registration{color:#ff1a1a;
font-size:1rem;}		
#title{color:red;
	text-align:center;
font-size:3rem;
font-family:"Times New Roman", Times, serif;}		
body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  //background: white;
  background-size: cover;
}
.login-box{
  width: 280px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  color: white;
}
.login-box h1{
  float: left;
  font-size: 40px;
  border-bottom: 6px solid #4caf50;
  margin-bottom: 50px;
  padding: 13px 0;
}
.textbox{
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid #4caf50;
}
.textbox i{
  width: 26px;
  float: left;
  text-align: center;
}
.textbox input{
  border: none;
  outline: none;
  background: none;
  color: white;
  font-size: 18px;
  width: 80%;
  float: left;
  margin: 0 10px;
}
.btn{
  width: 100%;
  background: none;
  border: 2px solid #4caf50;
  color: white;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;
}

</style>
 <?php
if(isset($_POST['t1']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MajorProject";

$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare("select eid,ename,password from lawyer where ename=?");
$stmt->bind_param("s",$first);
$first = $_POST['t1'];
$password = $_POST['t2'];
$stmt->execute();
$stmt->bind_result($l,$x,$y);

if($stmt->fetch())
  {
	if($y==$password)
	{
		$_SESSION['log']=$x;
		echo "WELCOME ".$x;
		header('HTTP/1.1 307 Temporary Redirect');
		header("location:lawyerFun.php");
	}
    else
		echo "INCORRECT PASSWORD";
  }
else
    echo "not found";

$stmt->close();
$conn->close();
}
?>
</div>
</body>
</html>