<?php

    /*
        Template file : login.tpl.php
    */

    if(method_exists ('AccountsView','alertBox')){
    // ** If someone trys to vistit this page by typing url, the method would not be available
?>

<form action="inc/login.inc.php" method = 'post' class ='login_form'>
    <h1>Log in</h1>
    <?php AccountsView::alertBox(); ?>
    <input type="text" name='user_ids' value = "<?= AccountsView::$typed_uid;?>" placeholder = 'Email or username'>
    <input type="password" name='pass_login' placeholder = 'Password'>
    <input type="submit" name='submit_login' value = 'LOG IN'>
</form>

<p id='suggest_signup'>
    Don't have an account?
    <a href="index.php">Sign up</a>
</p>

<?php
} else {
    // ** Redirect if someone manually typed the url
    header('location: .');
}