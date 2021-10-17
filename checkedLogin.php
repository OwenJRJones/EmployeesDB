<?php
    //Start session
    session_start();
    ob_start();

    //Connect to database
    require_once("dbConnect.php");
    $conn = getDbConnection();

    //Set POST form inputs to variables
    $loginUser = $_POST['loginUser'];
    $loginPwd = $_POST['loginPwd'];

    //Select any matches from the WebUsers table to authenticate user
    $sql = "SELECT * FROM WebUsers WHERE user_name = '$loginUser'";

    $result = mysqli_query($conn, $sql);

    if(!$result)
    {
        die("an error occurred in querying the database: " + mysqli_error($conn));
    }

    //Check if any matches return
    $count = mysqli_num_rows($result);

    mysqli_close($conn);

    if($count == 1)
    {
        $row = mysqli_fetch_assoc($result);
        $hash = $row['user_pwd'];

        if(password_verify($loginPwd, $hash))
        {
            $_SESSION['LoggedInUser'] = $loginUser;
            header('location:SearchEmployee.php');
        }

    }
    else
    {
        echo "Incorrect Login<br />";
        echo "<a href='mainLogin.html'>Try Again</a>";
    }


    ob_end_flush();