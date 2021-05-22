<html>
<style>
.frames{
	position:absolute;
	top:10%;
}
</style>
<?php session_start();?>
<div class="frames">
<h1 style="color:white;">Hello <?php echo $_SESSION['log'];?></h1>

<iframe name="f1" frameborder="2" src="userFun/addcase.php" width="200" height="70"></iframe>
<iframe name="f2" frameborder="2" src="userFun/checkdate.php" width="300" height="70"></iframe>

<iframe name="f3" frameborder="2" src="userFun/consultlawyer.php" width="200" height="70"></iframe>
<iframe name="f4" frameborder="2" src="userFun/seecasedata.php" width="240" height="70"></iframe>
<iframe name="f5" frameborder="2" src="userFun/checkcasestatus.php" width="240" height="70"></iframe>
<iframe name="f6" frameborder="2" src="userFun/checklawyertatus.php" width="240" height="70"></iframe>
</div>
</html>