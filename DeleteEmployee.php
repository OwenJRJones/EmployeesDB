<?php
    //Start session
    session_start();

    //Check if user is logged in
    require('isLoggedIn.php');
    checkedIfLoggedIn();

    //Connect to DB
    require_once("dbConnect.php");
    $conn = getDbConnection();

    $employeeId = $_POST['idDelete'];

    //Execute delete if ID field is filled out
    if(!empty($_POST['idDelete']))
    {
        $result = mysqli_query($conn, "DELETE FROM employees WHERE emp_no = '$employeeId';");

        if(!$result)
        {
            die("Could not delete record from employees database." . msqli_error($conn));
        }
        else
        {
            echo "Successfully deleted " . mysqli_affected_rows($conn) . " row(s).";
            echo "<br/><a href='SearchEmployee.php'>Back to Homepage</a>";
        }
    }

    mysqli_close($conn);