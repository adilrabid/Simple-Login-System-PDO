<?php
        session_start(); 

        //MODEL
        include 'model/Dbh.class.php';
        include 'model/Accounts.class.php';
        //VIEW
        include 'view/AccountsView.class.php';
        
        // Alert Handler
        AccountsView::alertHandler();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <span id='site_logo'>LOGO</span>
        <span>
        <a href="" class='nav_link'>Sample Page</a>
        <a href="" class='nav_link'>About</a>
        <a href="" class='nav_link'>Contact</a>   
        <?php 
            if(AccountsView::logged_in()){
                echo "<a class='nav_link'>Logged in as: ".$_SESSION['username']."</a>";
            }
        ?>
        <?php if (AccountsView::logged_in()){ ?>
            <a href="inc/logout.inc.php"class='button'>LOG OUT</a>
        <?php } else { ?>
            <a href="index.php?login=1"class='button'>LOG IN</a>
        <?php } ?>
    </nav>
    <div class='container'>

     