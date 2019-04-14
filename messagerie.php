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

    	require('includes/db/AccountManager.php');

    	$am = new AccountManager();
      $db = new Database();

      $q = $db->prepare('SELECT * FROM users WHERE id!=?');
      $q->execute([$_SESSION['id']]);

      echo '<br />';
      echo '<br />';
      echo '<br />';

      echo '<div class="messages-box">';
      echo '<div class="messages-box-friends col-sm-2">';
      echo '<ul>';

      while($data = $q->fetch())
      {
          if(isset($_GET['id']))
          {
            if($_GET['id'] == $data['id'])
            {
              echo '<li>';
              echo '<a href="messagerie.php?id=' . $data['id'] .'" class="messages-box-button active">';
              echo '<h5>';
              echo $data['surname'] . ' ' . $data['name'];
              echo '</h5>';
              echo'</a>';
              echo '</li>';
            }

            else
            {
              echo '<li>';
              echo '<a href="messagerie.php?id=' . $data['id'] .'" class="messages-box-button">';
              echo '<h5>';
              echo $data['surname'] . ' ' . $data['name'];
              echo '</h5>';
              echo'</a>';
              echo '</li>';
            }

          }

          else
          {
            echo '<li>';
            echo '<a href="messagerie.php?id=' . $data['id'] .'" class="messages-box-button">';
            echo '<h5>';
            echo $data['surname'] . ' ' . $data['name'];
            echo '</h5>';
            echo'</a>';
            echo '</li>';
          }

      }

      echo '</ul>';
      echo '</div>';

      echo '<div class="messages col-sm-8">';


      if(isset($_GET['id'])){

          $am->printMessages($_SESSION['id'], $_GET['id']);

          echo '<br/><br/><br/>';
          echo '<br/><br/><br/>';

          $url = $_SERVER['PHP_SELF'] . '?id=' . $_GET['id'];
  ?>

  <br>

	<form action=<?=$url?> method="post">
		<input type= "text" id="message-input" name="message" placeholder="Type message.."/>
		<input type="submit" id="message-submit" value = "Submit" />
	</form>

<?php

          echo '</div>';
          echo '</div>';
          echo '<br/><br/><br/>';
          echo '<br/><br/><br/>';
      }

      else {
        echo '</div>';
        echo '</div>';
        echo '<br/><br/><br/>';
        echo '<br/><br/><br/>';
      }
?>


</div>

</div>

	<?php

  }

	else {

		header('location: login.php');

	}

	?>

<div id="footer">

<?php include("includes/footer.php");?>
</div>



</body>
</html>
