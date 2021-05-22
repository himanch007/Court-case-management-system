<html>
<style>
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
body{
	background-image:url(../justice.jpg);
	background-position:center;
	background-size:cover;
	background-repeat:no-repeat;
}
</style>
 <body>
 <table border="1">
 <tr>
 <th>Lawyer name</th>
 </tr>

 <?php
 session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MajorProject";
$conn = new mysqli($servername, $username, $password, $dbname);

$stmt = $conn->prepare("select MIN(eid) from lawyer");
$stmt->execute();
$stmt->bind_result($a);
if($stmt->fetch())
	//echo $a;
$stmt->close();

$stmt = $conn->prepare("select MAX(eid) from lawyer");
$stmt->execute();
$stmt->bind_result($b);
if($stmt->fetch())
	//echo $b;
$stmt->close();

for($i=$a;$i<=$b;$i++)
{
$stmt = $conn->prepare("select ename from lawyer where eid=$i");
$stmt->execute();
$stmt->bind_result($x);

if($stmt->fetch())
  {
	  
   ?>
        <tr>
            <td><?php echo $x; ?></td>
		</tr>
  <?php

  }
  $stmt->close();
}
$conn->close();
?>
</table>
<br>
<form method="POST">
<label style="color:white;font-size:2rem;margin-bottom:10px;margin-left:500px;">Enter lawyer name</label>
<input type="text" name="t1" size="25" style="width:500px;margin-left:350px;"/><br><br>
<input type="submit" id="button" value="Send request to lawyer" style="margin-left:350px;"/>

<?php
if(isset($_POST['t1']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MajorProject";

$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare("select ename,description,typeofcase,status from cases where ename=?");
$stmt->bind_param("s",$v);
$v=$_SESSION['log'];
$stmt->execute();
$stmt->bind_result($a,$b,$c,$d);
if($stmt->fetch())

$stmt->close();

$first=$_POST['t1'];
$stmt = $conn->prepare("INSERT INTO $first(ename, description,typeofcase,status,caseaccepted) VALUES (?, ?,?,?,?)");
$stmt->bind_param("sssss",$a,$b,$c,$d,$e);
$e="No";
$stmt->execute();


$stmt->close();
$conn->close();

echo "\n\nYour case request has been sent to the lawyer";
}
?>
</form>
</body>
</html>