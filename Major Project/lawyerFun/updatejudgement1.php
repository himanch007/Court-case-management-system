<html>
<style>
body{background-image:url("../justice.jpg");
	background-position:center;
	background-size:cover;
	background-repeat:no-repeat;
color:white;}

form{
display:flex;
flex-direction:column;
flex-wrap:column;
}
#button{
  padding: 10px;
  font-weight: bold;
  font-size: 18px;
  width: 500px;
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
#button:hover {
  box-shadow: 14px 14px rgba(77, 77, 77, 0.5);
}
#button:active {
  transform: translate3d(7px, 7px, 0px);
  box-shadow: 7px 7px rgba(77, 77, 77, 0.5);
}
#button{
	background-color:red;
	margin-bottom:10px;
	margin-top:10px;
}
</style>
<body>
<div class="lawyer">
<form method="POST">
<label style="color:black;font-size:2rem;margin-bottom:10px;text-align:left;color:white;margin-left:500px;">Enter the name of your client</label>
<input type="text" name="t2" size="30" style="height:40px;width:400px;margin-left:500px;"/><br><br>
<label style="color:black;font-size:2rem;margin-bottom:10px;text-align:left;color:white;margin-left:500px;">Enter the status of the case</label>
<input type="text" name="t1" size="50" style="height:40px;width:400px;margin-left:500px;"/><br><br>
<input type="submit" id="button" style="margin-left:450px;" value="Update case status"/>
</div>
</form>
<?php
session_start();
if(isset($_POST['t1']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MajorProject";

$v=$_POST['t1'];
$n=$_POST['t2'];
$conn = new mysqli($servername, $username, $password, $dbname);

$a="Unassigned";
$sql = "update cases set status='$v',lawyerstatus='$a' where ename='$n'";

if ($conn->query($sql) === TRUE) {
  echo "Case status has been updated";
} else {
  echo "Error updating record: " . $conn->error;
}
$f=$_SESSION['log'];

$sq = "update $f set status='$v' where ename='$n'";

if ($conn->query($sq) === TRUE)


$conn->close();

}
?>
</body>
</html>