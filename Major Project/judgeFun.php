<html>
<style>
table{
	width:800px;
	height:200px;
}
tr{
	text-align:center;
	height:40px;
	color:white;
	background-color:skyblue;
}
th{
	font-size:1rem;
	font-family:"Times New Roman", Times, serif;
	font-weight:bold;
	background-color:lightgreen;
	text-transform:uppercase;
}
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
<?php session_start(); ?>
<h1 style="color:white;">Hello <?php echo $_SESSION['log'];?></h1>

<body>
 <table border="1">
 <tr>
 <th>Name</th>
 <th>Case description</th>
 <th>Type of case</th>
 <th>Status</th>
 <th>Lawyer</th>
 <th>date of hearing</th>
 </tr>

 <?php	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MajorProject";
$conn = new mysqli($servername, $username, $password, $dbname);

$stmt = $conn->prepare("select MIN(eid) from cases");
$stmt->execute();
$stmt->bind_result($a);
if($stmt->fetch())
	//echo $a;
$stmt->close();

$stmt = $conn->prepare("select MAX(eid) from cases");
$stmt->execute();
$stmt->bind_result($b);
if($stmt->fetch())
	//echo $b;
$stmt->close();
$a2="Assigned";
for($i=$a;$i<=$b;$i++)
{
$stmt = $conn->prepare("select ename,description,typeofcase,status,lawyer,dateofhearing from cases where eid=$i and lawyerstatus='$a2'");
$stmt->execute();
$stmt->bind_result($c,$d,$e,$x,$y,$z);

if($stmt->fetch())
  {
	  
   ?>
        <tr>
            <td><?php echo $c; ?></td>
			<td><?php echo $d; ?></td>
			<td><?php echo $e; ?></td>
			<td><?php echo $x; ?></td>
			<td><?php echo $y; ?></td>
			<td><?php echo $z; ?></td>
		</tr>
  <?php

  }
  $stmt->close();
}
$conn->close();
?>
</table>
<div class="judge">
<form method="POST">
<label style="color:black;font-size:2rem;margin-bottom:10px;text-align:left;color:white;margin-top:10px;">Enter name to give next hearing</label>
<input type="text" name="t1" size="25" style="height:40px;width:300px;"/><br><br>
<label style="color:black;font-size:2rem;margin-bottom:10px;text-align:left;color:white;">Enter next hearing date</label>
<input type="text" name="t2" size="10" style="height:40px;width:300px;"/><br><br>
<input type="submit" id="button" value="Send conformation to client"/>

</form>
</div>
<?php
if(isset($_POST['t1']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MajorProject";

$v=$_POST['t1'];
$a1=$_POST['t2'];
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "update cases set dateofhearing='$a1' where ename='$v'";

if ($conn->query($sql) === TRUE) {
  //echo "Date has been given";
} else {
  echo "Error updating record: " . $conn->error;
}

$stmt = $conn->prepare("select lawyer from cases where ename='$v'");
$stmt->execute();
$stmt->bind_result($x);
if($stmt->fetch())

$stmt->close();
echo $x;
$sq = "update $x set dateofhearing='$a1' where ename='$v'";

if ($conn->query($sq) === TRUE)
echo "Date has been given";
$conn->close();

}
?>
</body>
</html>