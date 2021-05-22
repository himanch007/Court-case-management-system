<html>
<style>
body{background-image:url("../justice.jpg");
	background-position:center;
	background-size:cover;
	background-repeat:no-repeat;
color:white;}
table{
	width:800px;
	height:200px;
	margin-left:250px;
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
<body>
 <table border="1">
 <tr>
 <th>Client name</th>
 <th>Case description</th>
 <th>Type of case</th>
 <th>Status</th>
 <th>date of hearing</th>
 <th>Case accepted</th>
 </tr>

 <?php
 session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MajorProject";
$conn = new mysqli($servername, $username, $password, $dbname);
$f=trim($_SESSION['log']);
//echo $f;
$stmt = $conn->prepare("select MIN(eid) from $f");
//$stmt->bind_param("s",$f);
$stmt->execute();
$stmt->bind_result($a);
if($stmt->fetch())
	//echo $a;
$stmt->close();

$stmt = $conn->prepare("select MAX(eid) from $f");
$stmt->execute();
$stmt->bind_result($b);
if($stmt->fetch())
	//echo $b;
$stmt->close();

for($i=$a;$i<=$b;$i++)
{
$stmt = $conn->prepare("select ename,description,typeofcase,status,dateofhearing,caseaccepted from $f where eid=$i");
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

<div class="lawyer">
<form method="POST">
<label style="color:yellow;font-size:2rem;margin-top:30px;margin-left:250px;">Enter name of the client whose case you want to accept</label>
<input type="text" name="t1" size="25" style="height:40px;width:400px;margin-left:400px;"/><br><br>
<input type="submit" id="button" style="margin-left:350px;" value="Send conformation to client"/>
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
$a1="Assigned";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "update cases set lawyer='$f',lawyerstatus='$a1' where ename='$v'";

if ($conn->query($sql) === TRUE) {
  echo "Your case conformation has been sent to your client";
} else {
  echo "Error updating record: " . $conn->error;
}
$sq = "update $f set caseaccepted='Yes' where ename='$v'";

if ($conn->query($sq) === TRUE)


$conn->close();

}
?>
</body>
</html>