<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
.a,.address{
display:flex;
flex-direction:column;
flex-wrap:column;
}
#name,#password,#email,#phone{
width:400px;
height:40px;
margin-bottom:30px;
color:black;
border:1px solid black;
}
.radio{
	height:80px;
	width:100%;
}
#radio_button{
	heigth:50px;
	margin-left:50px;
	font-size:5rem;
}
#signup,#reset{
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
#signup:hover {
  box-shadow: 14px 14px rgba(77, 77, 77, 0.5);
}
#reset:hover {
  box-shadow: 14px 14px rgba(77, 77, 77, 0.5);
}
#signup:active {
  transform: translate3d(7px, 7px, 0px);
  box-shadow: 7px 7px rgba(77, 77, 77, 0.5);
}
#reset:active {
  transform: translate3d(7px, 7px, 0px);
  box-shadow: 7px 7px rgba(77, 77, 77, 0.5);
}
#signup{
	background-color:red;
	margin-bottom:10px;
	margin-top:10px;
}
#reset{
	background-color:blue;
	margin-bottom:10px;
}
body{
	background-image:url(image4.jpg);
	background-position:center;
	background-size:cover;
	background-repeat:no-repeat;
}
#address{
	width:500px;
}
</style>
<h1>Judge Registration</h1>
<form method="post">
<div class="a">
<label style="color:black;font-size:1.5rem;">Name</label>
<input type="text" id="name" name="t1" size="25"/required>
<label style="color:black;font-size:1.5rem;">Password</label>
<input type="password" id="password" name="t2" size="25"/required>
<label style="color:black;font-size:1.5rem;">Email id</label>
<input type="email" name="t3" id="email" size="25"/required>
<label style="color:black;font-size:1.5rem;">Phone number</label>
<input type="text" name="t4" id="phone" size="25"/required>
</div>
<div class="radio">
<label style="color:black;font-size:1.5rem;">Sex</label>
<input id="radio_button" type="radio" name="r1"/><label style="font-size:1.5rem;">Male</label></input>
<input id="radio_button" type="radio" name="r1"/><label style="font-size:1.5rem;">Female</label></input>
</div>
<div class="address">
<label style="color:black;font-size:1.5rem;">Address</label>
<textarea id="address" name="ta1" rows="5" cols="40"></textarea>
<input type="submit" id="signup" value="sign up"/>
<input type="reset" id="reset" value="reset"/>
</div>
</form>
<?php
if(isset($_POST['t1']))
{
	$servername = "localhost";
        $username = "root";
	$password = "";
	$dbname = "MajorProject";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$stmt = $conn->prepare("INSERT INTO judge(ename, password) VALUES (?, ?)");
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