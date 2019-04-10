<?php include("includes/config.php");?>

<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/social-media.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">

  <br />

	<?php

			require("includes/sign_up_post.php");
			require('includes/utility.php');

			if(!empty($_POST))
				sign_up();

			else
			{
				$variables = ['src' => 'sign_up.php'];
				includeFile("includes/sign_up_form.php", $variables);
			}


		?>


</div>

<?php include("includes/footer.php");?>

</body>
</html>
