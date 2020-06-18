<?php

class Accounts extends Dbh{

    protected $loggedin_uid;
    protected $loggedin_username;
    protected $record;
    protected $table_name;

    protected function getUser($user_ids,$password){

        $sql = "SELECT * FROM accounts WHERE username = ? OR email = ?";
        $stmt = $this->connection()->prepare($sql);
        $stmt->execute([$user_ids, $user_ids]);

        $record = $stmt->fetch();
        $this->record = $record;
        
        //die('<br><pre>'.print_r($record).'</pre><br>');

        $pass_check = password_verify($password, $record['pass']);

        $this->loggedin_uid = $record['id'];
        $this->loggedin_username = $record['username'];
        
        return $pass_check;
    }

    protected function setAccount($username, $email, $password){

        $sql = "INSERT INTO accounts (username, email, pass) VALUES ( ? , ? , ? )";
        $stmt = $this->connection()->prepare($sql);

        //Hashing the password before sending to database
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$username,$email,$password]);
    }

    protected function getEmails($email){
        $sql = "SELECT id FROM accounts WHERE email = ?";
        $stmt = $this->connection()->prepare($sql);
        $stmt->execute([$email]);

        $count = $stmt->rowCount();
        return $count;
    }

}