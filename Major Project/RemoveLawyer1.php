<?php
session_start();
?>
<html>
<style>
form{
display:flex;
flex-direction:column;
flex-wrap:column;
position:absolute;
top:50%;
left:40%;
}
#remove{
	background-color:red;
	margin-bottom:10px;
	margin-top:10px;
}
#reset{
	background-color:blue;
	margin-bottom:10px;
	margin-top:10px;
}

#remove,#reset{
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
#remove:hover {
  box-shadow: 14px 14px rgba(77, 77, 77, 0.5);
}
#reset:hover {
  box-shadow: 14px 14px rgba(77, 77, 77, 0.5);
}
#remove:active {
  transform: translate3d(7px, 7px, 0px);
  box-shadow: 7px 7px rgba(77, 77, 77, 0.5);
}
#reset:active {
  transform: translate3d(7px, 7px, 0px);
  box-shadow: 7px 7px rgba(77, 77, 77, 0.5);
}
#remove{
	background-color:red;
	margin-bottom:10px;
	margin-top:10px;
}
#reset{
	background-color:blue;
	margin-bottom:10px;
}
table{
	width:300px;
	height:90px;
}
tr{
	text-align:center;
	height:40px;
	color:white;
}
th{
	font-size:2rem;
	font-family:"Times New Roman", Times, serif;
	font-weight:bold;
	background-color:lightgreen;
	text-transform:uppercase;
}
body{
	background-image:url(image5.jpeg);
	background-position:center;
	background-size:cover;
	background-repeat:no-repeat;
}
</style>
<body>
<h1 style="text-align:center;text-transform:uppercase;color:white;font-size:3.5rem;text-decoration:underline;">Remove Lawyer</h1>

<table border="1" style="position:absolute;left:40%;top:20%;">
 <tr>
 <th>Lawyer name</th>
 </tr>

 <?php
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
<form method="POST">
<label style="color:black;font-size:2rem;margin-bottom:10px;text-align:left;color:white;">Enter lawyer name</label>
<input style="height:30px;width:400px;margin-bottom:10px" type="text" name="t1" size="25"/>

<input type="submit" id="remove" value="Remove"/>
<input type="reset" id="reset" value="reset"/>
</form>
 <?php
if(isset($_POST['t1']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MajorProject";

$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare("delete from lawyer where ename=?");
$stmt->bind_param("s",$first);
$first = $_POST['t1'];
$stmt->execute();

if($stmt->fetch())
  {
	
	echo "Lawyer removed";
  }
else
    echo "removed";

$stmt->close();
$conn->close();
}
?>
</body>
</html>