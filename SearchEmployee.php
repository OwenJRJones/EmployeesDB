<?php
    //Set variables for sticky form
    session_start();
    $keyword = $_POST['keyword'];

    //Check if user is logged in
    require('isLoggedIn.php');
    checkedIfLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Homepage</title>
    </head>
    <h1>Search First & Last Names From Database</h1>
    <form id="searchEmployee" name="searchEmployee" method="post" action="SearchEmployee.php">
        <p><label>Search <input type="text" name="keyword" id="keyword" value='<?php echo $keyword ?>'/></label></p>
        <p><input type="submit" id="submit" value="Submit Query" /></p>
    </form>
    <body>
    </body>
</html>

<?php
    //Set up db connection
    require_once("dbConnect.php");
    $conn = getDbConnection();

    $keyword = $_POST['keyword'];

    //Code for keyword not set/load in page
    if(!isset($_POST['keyword'])) {

        $result = mysqli_query($conn, "SELECT * FROM employees LIMIT 25");

        if(!$result) {
            die("Could not retrieve records from the employees database: " . mysqli_connect_error());
        }

        echo "<table><tr><th>Emp. Number</th><th>Birth Date</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Hire Date</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["emp_no"] . "</td><td>" . $row["birth_date"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["hire_date"] . "</td></tr>";
        }
    }

    //Code for if keyword is set
    if(isset($_POST['keyword'])) {

        $result = mysqli_query($conn, "SELECT * FROM employees WHERE first_name LIKE '$keyword%' OR last_name LIKE '$keyword%' LIMIT 25");

        if(!$result) {
            die("Could not retrieve records from the employees database: " . mysqli_connect_error());
        }

        echo "<table><tr><th>Emp. Number</th><th>Birth Date</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Hire Date</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["emp_no"] . "</td><td>" . $row["birth_date"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["hire_date"] . "</td></tr>";
        }
    }

?>

<style>
    th, td {
        border: 2px solid forestgreen;
    }
    table {
        border: 2px solid black;
    }
</style>

<?php mysqli_close($conn);?>