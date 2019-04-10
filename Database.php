<?php

class Database
{
    public $pdo;

    public function __construct()
    {
      try
      {
      	 $this->pdo = new PDO('mysql:host=localhost;dbname=wei;charset=utf8', 'root', '');
         $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch (Exception $e)
      {
          die('Erreur : ' . $e->getMessage());
      }
    }

    public function login($email, $pwd)
    {
      $result = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
      $result->execute([$email]);

      if($user = $result->fetch())
      {
        if(strcmp($pwd, $user['password']) == 0)
        {
           return $user;
        }
      }

      return [];
    }

    public function sign_up($name, $surname, $email, $pwd)
    {
        $qu = $bdd->prepare('INSERT INTO users(name, surname, email, password) VALUES(:name, :surname, :email, :password)');
        $req->execute(array(
          'name' => $name,
          'surname' => $surname,
          'email' => $email,
          'password' => $pwd
          ));
    }

    public function printUserTable()
    {
        $result = $this->pdo->query('SELECT * FROM users');
        ?>
        <ul>
        <?php
        while ($data = $result->fetch())
        {
            ?>

            <li><?php echo $data['name'] . ' ' . $data['surname']; ?></li>

            <?php
        }

        ?>
        </ul>
        <?php
        $result->closeCursor();
    }
}

?>
