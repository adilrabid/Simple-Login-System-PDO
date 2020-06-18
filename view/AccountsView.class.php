<?php

class AccountsView extends Accounts{

    public static $operation;
    public static $alert;
    public static $typed_email;
    public static $typed_name;
    public static $typed_uid;

    public static function logged_in(){
         // ** Returns a boolean value according to the login status.

        if(isset($_SESSION['username']) && isset($_SESSION['id'])){
            return true;
        }else{
            return false;
        }
    }

    public static function errorAlert($error){
        // ** A method to generate an alert in the DOM.

        if ($error == 'empty-field') {
            self::$alert = 'Please fill up all the fields!';
        } elseif ($error == 'invalid-name-email') {
            self::$alert = 'Please enter a valid username and emai!';
        } elseif ($error == 'invalid-name') {
            self::$alert = 'Please enter a valid username!';
        } elseif ($error == 'invalid-email') {
            self::$alert = 'Please enter a valid email!';
        } elseif ($error == 'pass-unmatched') {
            self::$alert = 'Password did not matched';
        } elseif ($error == 'query-failed') {
            self::$alert = 'Something went wrong, please try again!';
        } elseif ($error == 'email-taken') {
            self::$alert = 'Already signed up with this email!';
        } elseif ($error == 'wrong-password') {
            self::$alert = 'Wrong password, try again!';
        } elseif ($error == 'user-not-found') {
            self::$alert = 'User not found!';
        } else{
            self::$alert = '';
        }

        self::$operation = 'error';
        return self::$alert;
    }

    public static function signupAlert(){
        self::$operation = 'success';
        self::$alert = 'You have successfully signed up!';
    }

    public static function alertBox(){
        // ** A method to generate an alert Box in the DOM.
        if(isset($_GET['err']) || isset($_GET['signup'])){
            $alertBox = "<div class ='alertBox ";
            $alertBox .= self::$operation;
            $alertBox .= "'>";
            $alertBox .= self::$alert;
            $alertBox .= "</div>";
            echo $alertBox;
        }
    }

    public static function alertHandler(){

        if (isset($_GET['err'])) {
            // ** Checks if there is any error information is the url.
            self::errorAlert($_GET['err']);
        }
        
        if (isset($_GET['signup'])) {
            // ** Checks if there is any signup related information is the url.
            self::signupAlert($_GET['signup']);
        }

        if (isset($_GET['name'])) {
            // ** Checks if a user already typed an username in the username field.
            self::$typed_name = $_GET['name'];
        }

        if (isset($_GET['email'])) {
            // ** Checks if a user already typed an email in the email field.
            self::$typed_email = $_GET['email'];
        }

        if (isset($_GET['uid'])) {
            // ** Checks if a user already typed anything in the Login user id field.
            self::$typed_uid = $_GET['uid'];
        }

    }

}