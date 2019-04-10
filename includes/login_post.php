<?php

  require('Database.php');

  function login()
  {

      if(isset($_POST['pwd']) && isset($_POST['email']))
      {
          $db = new Database();

          $data = $db->login($_POST['email'], $_POST['pwd']);


          if(!empty($data))
          {
              $_SESSION['name']     = $data['name'];
              $_SESSION['surname']  = $data['surname'];
              $_SESSION['email']    = $data['email'];
          }

          else
          {
            echo '<p>Wrong email or password</p>';
          }
      }
  }

?>
