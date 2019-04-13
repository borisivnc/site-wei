<?php

    require('Database.php');

    class AccountManager
    {
        public $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function login($email, $pwd)
        {
          $result = $this->db->prepare("SELECT * FROM users WHERE email = ?");
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
            $result = $this->db->prepare('INSERT INTO users(name, surname, email, password) VALUES(:name, :surname, :email, :password)');
            $result->execute(array(
              'name' => $name,
              'surname' => $surname,
              'email' => $email,
              'password' => $pwd
              ));
        }


        public function printUserTable()
        {
            $result = $this->db->query('SELECT * FROM users');
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
