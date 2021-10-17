<?php
    //Start session
    session_start();

    //Check if user is logged in
    require('isLoggedIn.php');
    checkedIfLoggedIn();

    //Connect to DB
    require_once("dbConnect.php");
    $conn = getDbConnection();

    $employeeId = $_POST['employeeId'];

    //Execute update if all fields are filled out
    if(!empty($_POST['fName']) && !empty($_POST['lName']) && !empty($_POST['birthDate']) && !empty($_POST['gender']) && !empty($_POST['hireDate']))
    {
        $sql = "UPDATE employees SET first_name = '";
        $sql .= $_POST['fName'];
        $sql .= "', last_name = '";
        $sql .= $_POST['lName'];
        $sql .= "', birth_date = '";
        $sql .= $_POST['birthDate'];
        $sql .= "', gender = '";
        $sql .= $_POST['gender'];
        $sql .= "', hire_date = '";
        $sql .= $_POST['hireDate'];
        $sql .= "' WHERE emp_no = ";
        $sql .= $employeeId;
        $sql .= ";";

        $result = mysqli_query($conn, $sql);

        if(!$result)
        {
            die("Could not update record in employees database. " . mysqli_error($conn));
        }
        else
        {
            echo "Successfully updated " . mysqli_affected_rows($conn) . " row(s).";
            echo "<br /><a href='SearchEmployee.php'>Back to Homepage</a>";
        }
    }

    mysqli_close($conn);