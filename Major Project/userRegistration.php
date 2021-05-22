<html>
<body>
<form method="post">
Name:<input type="text" name="t1" size="25"/><br><br>
Password:<input type="password" name="t2" size="25"/><br><br>
E-mail id:<input type="text" name="t3" size="25"/><br><br>
Phone number:<input type="text" name="t4" size="25"/><br><br>
Sex:<input type="radio" name="r1"/>Male</input>
<input type="radio" name="r1"/>Female</input><br><br>
Date of birth:<input type="text" name="t5" size="10"/>
<input type="text" name="t6" size="10"/>
<input type="text" name="t7" size="10"/><br><br>
Languages known:<br>
<input type="checkbox" name="c1"/>telugu</input>
<input type="checkbox" name="c2"/>hindi</input>
<input type="checkbox" name="c3"/>english</input><br><br>
Address:<br>
<textarea name="ta1" rows="5" cols="40"></textarea><br><br>
<input type="submit" value="sign up"/>
<input type="reset" value="reset"/>
</form>
<?php
if(isset($_POST['t1']))
{
	$servername = "localhost";
        $username = "root";
	$password = "";
	$dbname = "MajorProject";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$stmt = $conn->prepare("INSERT INTO user(ename, password) VALUES (?, ?)");
	$stmt->bind_param("ss", $first, $last);
	$first = $_POST['t1'];
	$last = $_POST['t2'];
	$stmt->execute();
	echo "Your account has been successfully created";


}
else
{
	echo "";
}
?>
</body>
</html>