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

    //Retrieve record to be deleted
    if(!empty($_POST['employeeId'])) {

        echo "<h1>Are you sure you want to delete this record?</h1>";

        $result = mysqli_query($conn, "SELECT * FROM employees WHERE emp_no = $employeeId;");

        echo "<table><tr><th>Emp. Number</th><th>Birth Date</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Hire Date</th></tr>";

        while ($row = mysqli_fetch_assoc($result))
        {
            echo "<tr><td>" . $row["emp_no"] . "</td><td>" . $row["birth_date"] . "</td><td>" . $row["first_name"] . "</td><td>" .
                $row["last_name"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["hire_date"] . "</td></tr>";
        }

        //Form to confirm deletion of record
        echo "<form id='confirmDelete' name='confirmDelete' method='post' action='DeleteEmployee.php'>
                <p><input hidden type='text' id='idDelete' name='idDelete' value='$employeeId'/></p>
                <p><input type='submit' id='confirm' name='confirm' value='Confirm'/><p>
            </form>";
    }

    echo "<a href='SearchEmployee.php'>Back to Homepage</a>";

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <style>
        th, td {
            border: 2px solid forestgreen;
        }
        table {
            border: 2px solid black;
        }
    </style>
    <head>
        <title>Delete Actor</title>
    </head>
    <body>
    </body>
</html>

