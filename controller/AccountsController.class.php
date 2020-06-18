<?php

class AccountsController extends Accounts{

    public function createAccount($username, $email, $password){
        $this->setAccount($username, $email, $password);
    }

    public function getEmailCount($email){
        $count = $this->getEmails($email);
        return $count;
    }

    public function userAuth($user_ids, $password){
        $auth = $this->getUser($user_ids, $password);
        if($this->record){
            if($auth){
            // If authentication successful
            session_start();

            $_SESSION['id'] = $this->loggedin_uid;
            $_SESSION['username'] = $this->loggedin_username;

            header("Location: ../index.php?login=success");
            exit;

            }else{
                header("Location: ../index.php?login=1&err=wrong-password&uid=".$user_ids);
                exit;
            }

        } else{
            header("Location: ../index.php?login=1&err=user-not-found");
            exit;
        }

    }

    public function loginAuth($user_ids, $password){
        if ( empty($user_ids) || empty($password)) {
            header("Location: ../index.php?login=1&err=empty-field&uid=".$user_ids);
            exit;

        } else {
            $this->userAuth($user_ids, $password);
        }

    }

    public function signupAuth($username, $email, $password, $password_repeat){
        if ( empty($username) || empty($email) || empty($password) || empty($password_repeat)) {
            // ** Checks if any input field is empty
            header("Location: ../index.php?err=empty-field&name=".$username."&email=".$email);
            exit; 
    
        } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/",$username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // ** If username and email in invalid
            header("Location: ../index.php?err=invalid-name-email");
            exit;
    
        } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/",$username) ) {
            // ** Checks if only the $username is invalid. 
            header("Location: ../index.php?err=invalid-name&email=".$email);
            exit;
    
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            // ** Checks if only the $email is invalid. 
            header("Location: ../index.php?err=invalid-email&name=".$username);
            exit;
    
        } elseif ( $password !== $password_repeat) {
            // ** Checks if the confirmation password matched or not. 
            header("Location: ../index.php?err=pass-unmatched&name=".$username."&email=".$email);
            exit;
    
        } else{
            // ** to check if there is already a user with the this email.
            $matched_res = $this->getEmailCount($email);
    
            if($matched_res > 0){
                header("Location: ../index.php?err=email-taken&email=".$email."&name=".$username);
                exit;
    
            }else{
                // Insert the new user info 
                $this->createAccount($username, $email, $password);
                header("Location: ../index.php?signup=success");
                exit;
    
            }
        } 

    }

}