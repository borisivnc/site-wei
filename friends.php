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

<?php

    if(isset($_SESSION['id']))
    {
        echo '<br/><a href="session_destroy.php?comeback=friends.php">Se deconnecter</a><br />';
        echo 'Session ID : ' . $_SESSION['id'];
        echo '<br />';
        echo '<br />';
        echo '<br />';

        require('includes/db/Database.php');
        $db = new Database();
        $q = $db->prepare('SELECT * FROM users WHERE id!=?');
        $q->execute([$_SESSION['id']]);

        echo '<div class="btn-group-vertical">';

        while($data = $q->fetch())
        {
          if(isset($_GET['conv']))
          {
              if(strcmp($data['surname'], $_GET['conv']) == 0)
              {
                echo '<button type="button" class="btn btn-primary">';
                echo $data['surname'] . ' (ID : ' . $data['id'];
                echo ')</button>';
              }

              else
              {
                echo '<button type="button" class="btn btn-light"><a href="friends.php?conv=' . $data['surname'] .'">';
                echo $data['surname'] . ' (ID : ' . $data['id'];
                echo ')</a></button>';
              }
          }

          else {
            echo '<button type="button" class="btn btn-light"><a href="friends.php?conv=' . $data['surname'] .'">';
            echo $data['surname'] . ' (ID : ' . $data['id'];
            echo ')</a></button>';
          }

        }

        echo '</div>';
        echo '<br />';
        echo '<br />';
        echo '<br />';

    }

    else
    {
        header('location: login.php');
    }


?>

</div>

<?php include("includes/footer.php");?>

</body>
</html>
