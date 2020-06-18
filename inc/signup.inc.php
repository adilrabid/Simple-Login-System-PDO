<?php 

if (isset($_POST['submit_signup'])) { 

    // MODELS
    include '../model/Dbh.class.php';
    include '../model/Accounts.class.php';

    //CONTROLLER
    include '../controller/AccountsController.class.php';

    $username = trim($_POST['name']);
    $email = trim($_POST['email_signup']);
    $password = $_POST['pass_signup'];
    $password_repeat = $_POST['pass_repeat'];

    $signup = new AccountsController;
    $signup->signupAuth($username, $email, $password, $password_repeat);

}else{
    // ** Redirects if the user somehow tricked and typed the url to get here.
    header("Location: ../");
    exit;
}