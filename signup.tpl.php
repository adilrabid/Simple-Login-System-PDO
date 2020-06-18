<?php

    /*
        Template file : signup.tpl.php
    */
    if(method_exists ('AccountsView','alertBox')){
    // ** If someone trys to vistit this page by typing url, the method would not be available
?>

<div id ='signup_section' class = 'col-2'>
    <aside>
        <h1> Welcome to the Simple Login System</h1>
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci placeat earum perspiciatis cupiditate ab aperiam tempore, illum ducimus rem atque accusamus aspernatur sequi assumenda nesciunt totam rerum. Alias, unde culpa.
        </p>
        <p class='attention'>Attention !!! If you haven't created the database called 'simple_login_system', then go and create it first. Otherwise this system won't work. No need to create any tables, it will be created autometically.</p>
        <button class = "button">Learn More</button>
    </aside>
    <form action="inc/signup.inc.php" method = 'post' class ='sign_up_form'>
        <h1>Sign up</h1>
        <?php AccountsView::alertBox();?>
        <input type="text" name='name' value = "<?= AccountsView::$typed_name;?>" placeholder = 'Your name'>
        <input type="text" name='email_signup' value ="<?= AccountsView::$typed_email;?>" placeholder = 'Your email'>
        <!-- Didn't setted the type 'email', instead setted ot to 'text' to verify the email validation. -->
        <!-- <input type="email" name='email_signup' value ="<?php // AccountsView::$typed_email;?>" placeholder = 'Your email'> -->
        <input type="password" name='pass_signup' placeholder = 'Type a password'>
        <input type="password" name='pass_repeat' placeholder = 'Confirm password'>
        <input type="submit" name='submit_signup' value = 'SIGN UP'>
    </form>
</div>

<?php

} else {
    // ** Redirect if someone manually typed the url
    header('location: .');
}