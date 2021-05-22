<?php
session_start();
?>
<html>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
#name{
width:400px;
height:40px;
margin-bottom:30px;
color:black;
border:1px solid black;
}

#register,#reset{
  padding: 10px;
  font-weight: bold;
  font-size: 18px;
  width: 200px;
  height: 50px;
  font-family: Sans-Serif;
  //background-color: #4CAF50;
  border: 3px solid #4CAF50;
  color: white;
  text-transform: uppercase;
  //width: inherit;
  text-shadow: 4px 4px 3px rgba(77, 77, 77, 0.5);
  box-shadow: 14px 14px rgba(77, 77, 77, 0.1);
  cursor: pointer;
  transition: transform 0.4s, box-shadow 0.4s;
}
#register:hover {
  box-shadow: 14px 14px rgba(77, 77, 77, 0.5);
}
#reset:hover {
  box-shadow: 14px 14px rgba(77, 77, 77, 0.5);
}
#register:active {
  transform: translate3d(7px, 7px, 0px);
  box-shadow: 7px 7px rgba(77, 77, 77, 0.5);
}
#reset:active {
  transform: translate3d(7px, 7px, 0px);
  box-shadow: 7px 7px rgba(77, 77, 77, 0.5);
}
#register{
	background-color:red;
	margin-bottom:10px;
	margin-top:10px;
}
#reset{
	background-color:blue;
	margin-bottom:10px;
}
body{
	background-image:url(../image4.jpg);
	background-position:center;
	background-size:cover;
	background-repeat:no-repeat;
}
</style>
<body>
<h1 style="text-align:center;text-transform:uppercase;">Add case</h1>
<div>
<form method="post">
<label style="color:black;font-size:1.5rem;">Case description</label><br><br>
<textarea name="des" id="name" rows="5" cols="40" style="height:100px;width:500px;"></textarea><br><br>
<label style="color:black;font-size:1.5rem;">Type of case</label>
<select name="typeofcase">
  <option value="civilcase">Civil case</option>
  <option value="criminalcase">Criminal case</option>
  </select><br><br>
<input type="submit" id="register" value="Register case"/>
<input type="reset" id="reset" value="reset"/>
</form>
</div>
<?php
if(isset($_POST['des']))
{
	$servername = "localhost";
        $username = "root";
	$password = "";
	$dbname = "MajorProject";
	$conn = new mysqli($servername, $username, $password, $dbname);
	
$stmt = $conn->prepare("insert into cases(ename,description,typeofcase,status,lawyerstatus) values(?,?,?,?,?)");
$stmt->bind_param("sssss", $first, $last, $a, $b, $c);
	$first = $_SESSION['log'];
	$last = $_POST['des'];
	$a = $_POST['typeofcase'];
	$b = "Pending";
	$c = "Not assigned";
	$stmt->execute();
echo "Your case has been successfully registered";
$conn->close();
}
?>

</body>
</html>