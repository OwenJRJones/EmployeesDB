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

    if(isset($_POST['employeeId'])) {
        $result = mysqli_query($conn, "SELECT * FROM employees WHERE emp_no = '$employeeId';");

        if (!$result) {
            die("Could not retrieve record from employees database. " . mysqli_error($conn));
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $fName = $row['first_name'];
            $lName = $row['last_name'];
            $birthDate = $row['birth_date'];
            $gender = $row['gender'];
            $hireDate = $row['hire_date'];
        }
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update Employee</title>
    </head>
    <body>
        <h1>Update Employee Record</h1>
        <form id="UpdateEmployee" name="UpdateEmployee" method="post" action="ExecuteUpdate.php">
            <p><label>First Name: <input type="text" name="fName" id="fName" value="<?php echo $fName?>"/></label></p>
            <p><label>Last Name: <input type="text" name="lName" id="lName" value="<?php echo $lName ?>"/></label></p>
            <p><label>Birth date: <input type="text" name="birthDate" id="birthDate" value="<?php echo $birthDate ?>"/></label></p>
            <p><label>Gender: <input type="text" name="gender" id="gender" value ="<?php echo $gender ?>"/></label></p>
            <p><label>Hire date: <input type="text" name="hireDate" id="hireDate" value="<?php echo $hireDate ?>"/></label></p>
            <input hidden type="text" name="employeeId" id="employeeId" value="<?php echo $employeeId ?>">
            <p><input type="submit" id="submit" value="Update"/></p>
            <a href="SearchEmployee.php">Back to Homepage</a>
        </form>
    </body>
</html>

