<?php

if (isset($_POST['submit_login'])) {

    // MODELS
    include '../model/Dbh.class.php';
    include '../model/Accounts.class.php';

    //CONTROLLER
    include '../controller/AccountsController.class.php';

    $user_ids = trim($_POST['user_ids']);
    $password = $_POST["pass_login"];

    $login = new AccountsController;
    $login->loginAuth($user_ids, $password);

} else {
    header("Location: ../");
    exit;
}
