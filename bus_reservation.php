<?php include("includes/config.php");?>

<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
  <link rel="stylesheet" href="ressources/css/bus.css">
	<script type="text/javascript" src="js/bookSeat.js"></script>
</head>
<body>

<?php include("includes/social-media.php");?>
<?php include("includes/navigation.php");?>

<br />

<div class="container" id="main-content">
<br />
<br />

<?php

  require("includes/generate_bus.php");

  generate_bus(1);

	 ?>


<br />


</div>

<?php include("includes/footer.php");?>

</body>
</html>
