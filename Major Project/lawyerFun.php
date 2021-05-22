<html>
<style>
.frames{
	position:absolute;
	top:25%;
	left:30%;
}
</style>
<?php session_start();?> 
<h1 style="color:white;">Hello <?php echo $_SESSION['log'];?></h1>
<div class="frames">
<iframe name="f1" frameborder="2" src="lawyerFun/checkcase.php" width="200" height="70"></iframe>

<iframe name="f1" frameborder="2" src="lawyerFun/updatejudgement.php" width="250" height="70"></iframe>
</div>
</html>