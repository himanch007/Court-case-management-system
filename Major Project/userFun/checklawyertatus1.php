<html>
<style>
body{
	background-image:url(../image4.jpg);
	background-position:center;
	background-size:cover;
	background-repeat:no-repeat;
}
</style>
<body>

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MajorProject";

$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare("select lawyer,lawyerstatus from cases where ename=?");
$stmt->bind_param("s",$first);
$first = $_SESSION['log'];
$stmt->execute();
$stmt->bind_result($x,$y);
$res="";
if($stmt->fetch())
  {
	if($y=="Assigned")
	{
		$res= $x." has been assigned to you";
	}
    else
		$res= "No lawyer has been assigned to you";
  }

$stmt->close();
$conn->close();

?>
<h1 style="margin-left:100px;margin-top:100px;"><?php echo $res;?></h1>
</body
</html>