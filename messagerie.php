<?php include("includes/config.php");?>

<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<div id ="wrapper">



<?php include("includes/social-media.php");?>
<?php include("includes/navigation.php");?>

<div class="container">

<br>
  <?php 
  
	if (isset($_SESSION['id'])){
	
	require('Database.php');
	
	$db = new Database();
	
	
	if (isset($_POST['message'])){
		
		$db->WriteMessage($_POST['message'],$_SESSION['id'],2);
	
	}
	
	
	
	$db->printMessages($_SESSION['id'],2);	
	
  ?>
  
  <br>
	<form action="messagerie.php" method="post">
		<label for="msg"><b>Message</b></label>
		<input type= "text" name="message" placeholder="Type message.."/>
		<input type="submit" value = "Submit" />

			<br>
	</form>
  

</div>

</div>

	<?php }
		
	else {
		
		header('location: login.php');
		
	}



	?>

<div id="footer">

<?php include("includes/footer.php");?>
</div>



</body>
</html>
