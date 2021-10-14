<?php
    //Check if user is logged in
    function checkedIfLoggedIn()
    {
        session_start();
        if(empty($_SESSION['LoggedInUser']))
        {
            header("location:mainLogin.html");
        }
    }