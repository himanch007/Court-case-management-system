<html>
<style>
body{
	background-image:url(../image4.jpg);
	background-position:center;
	background-size:cover;
	background-repeat:no-repeat;
}
</style>
<?php
session_start();
	$servername = "localhost";
        $username = "root";
	$password = "";
	$dbname = "MajorProject";
	$conn = new mysqli($servername, $username, $password, $dbname);
	
$stmt = $conn->prepare("select description from cases where ename=?");
$stmt->bind_param("s", $first);
	$first = $_SESSION['log'];
	$stmt->execute();
	$stmt->bind_result($x);
echo $x;
$res="";
if($stmt->fetch())
  {
	$res= "Case description: ".$x;	
  }
$conn->close();

?>
<h1 style="margin-left:100px;margin-top:100px;"><?php echo $res;?></h1>
</html>