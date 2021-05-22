<html>
<style>
.frames{
	position:absolute;
	top:25%;
}
</style>
<?php session_start();?>
<h1 style="color:white;">Hello <?php echo $_SESSION['log'];?></h1>
<div class="frames">
<iframe name="f3" frameborder="2" src="addLawyer.php" width="200" height="70"></iframe>
<iframe name="f4" frameborder="2" src="addJudge.php" width="240" height="70"></iframe>
<iframe name="f5" frameborder="2" src="removeLawyer.php" width="240" height="70"></iframe>
<iframe name="f6" frameborder="2" src="removeJudge.php" width="240" height="70"></iframe>
</div>

</html>