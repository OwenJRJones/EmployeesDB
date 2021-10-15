<?php
    //Set variables for sticky form
    session_start();

    //Check if user is logged in
    require('isLoggedIn.php');
    checkedIfLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add New Employee</title>
    </head>
    <body>
        <h1>Add New Employee</h1>
        <form id="InsertEmployee" name="InsertEmployee" method="post" onSubmit="InsertEmployee.php">
            <p><label>First Name: <input type="text" name="fName" id="fName"/></label></p>
            <p><label>Last Name: <input type="text" name="lName" id="lName"/></label></p>
            <p><label>Birth date: <input type="text" name="birthDate" id="birthDate" placeholder="YYYY-MM-DD"/></label></p>
            <p><label>Gender: <input type="text" name="gender" id="gender" placeholder="M/F"/></label></p>
            <p><label>Hire date: <input type="text" name="hireDate" id="hireDate" placeholder="YYYY-MM-DD"/></label></p>
            <p><input type="submit" id="submit" value="Submit"/></p>
        </form>
    </body>
</html>

<?php
    //Connect to DB
    require_once("dbConnect.php");
    $conn = getDbConnection();

    //Set POST data to variables
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $birthDate = $_POST['birthDate'];
    $gender = $_POST['gender'];
    $hireDate = $_POST['hireDate'];

    //Check the fields for input
    if(isset($_POST['fName']) AND isset($_POST['lName']) AND isset($_POST['birthDate']) AND isset($_POST['gender']) AND isset($_POST['hireDate']))
    {
        $sql = "INSERT INTO employees (first_name,last_name,birth_date,gender,hire_date) VALUES ('";
        $sql .= $_POST['fName'];
        $sql .= "','";
        $sql .= $_POST['lName'];
        $sql .= "','";
        $sql .= $_POST['birthDate'];
        $sql .= "','";
        $sql .= $_POST['gender'];
        $sql .= "','";
        $sql .= $_POST['hireDate'];
        $sql .= "');";

        $result = mysqli_query($conn, $sql);

        if(!$result)
        {
            die("Please check that all fields are filled out and in the correct format.");
        }
        else
        {
            echo "Successfully inserted " . mysqli_affected_rows($conn) . " row(s) <br/>";
            echo "<a href='SearchEmployee.php'>Back to Homepage</a>";
        }

    }

    mysqlI_close($conn);
