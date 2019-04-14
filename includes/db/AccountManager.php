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


  			public function printMessages($user_1_id, $user_2_id)
    		{
      			$result = $this->db->prepare('SELECT * FROM messages WHERE (sender_id=? and recipient_id=?) or (sender_id=? and recipient_id=?)');
      			$result->execute(array($user_1_id, $user_2_id, $user_2_id, $user_1_id));


      			while ($data = $result->fetch())
      			{
      				echo $data['message'] . ' <br />';
      			}

      			$result->closeCursor();
    		}

    		public function WriteMessage($message,$sender_id,$recipient_id)
    		{
      			$req = $this->db->prepare('INSERT INTO messages(message, sender_id, recipient_id) VALUES(:message, :sender_id, :recipient_id)');
      			$req->execute(array(
      			  'message' => $message,
      			  'sender_id' => $sender_id,
      			  'recipient_id' => $recipient_id
      			  ));
    		}
    }

?>
