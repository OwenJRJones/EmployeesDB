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
        <p><label>Search <input type="text" name="keyword" id="keyword" value="<?php echo $keyword ?>"/></label></p>
        <p><input type="submit" id="submit" value="Submit Query"/></p><p>Or</p>
    </form>
    <form id="AddNewEmployee" method="post" action="InsertEmployee.php">
        <input type="submit" id="InsertEmployee" value="Add New Employee" />
    </form>
    <br />
    <body>
    </body>
</html>

<?php
    //Connect to DB
    require_once("dbConnect.php");
    $conn = getDbConnection();

    $keyword = $_POST['keyword'];

    //Code for if keyword IS NOT set/page first loads in
    if(!isset($_POST['keyword']))
    {
        $result = mysqli_query($conn, "SELECT * FROM employees ORDER BY emp_no DESC LIMIT 25");

        if(!$result)
        {
            die("Could not retrieve records from the employees database: " . mysqli_connect_error($conn));
        }

        echo "<table><tr><th>Emp. Number</th><th>Birth Date</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Hire Date</th></tr>";

        while ($row = mysqli_fetch_assoc($result))
        {
            $employeeId = $row['emp_no'];

            echo "<tr><td>" . $row["emp_no"] . "</td><td>" . $row["birth_date"] . "</td><td>" . $row["first_name"] . "</td><td>" .
                 $row["last_name"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["hire_date"] . "</td><td>" .
                "<form id='updateEmployee' name='updateEmployee' method='post' action='UpdateEmployee.php'>
                    <input hidden type='text' id='employeeId' name='employeeId' value='$employeeId' />
                    <input type='submit' id='submit' value='Edit'/>
                 </form></td><td>" .
                 "<form id='deleteEmployee' name='deleteEmployee' method='post' action='ConfirmDelete.php'>
                    <input hidden type='text' id='employeeId' name='employeeId' value='$employeeId' />
                    <input type='submit' id='submit' value='Delete'/>
                  </form></td></tr>";
        }
    }

    //Code for if keyword IS set
    if(isset($_POST['keyword'])) {

        $result = mysqli_query($conn, "SELECT * FROM employees WHERE first_name LIKE '$keyword%' OR last_name LIKE '$keyword%' ORDER BY emp_no DESC LIMIT 25");

        if(!$result)
        {
            die("Could not retrieve records from the employees database: " . mysqli_connect_error($conn));
        }

        echo "<table><tr><th>Emp. Number</th><th>Birth Date</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Hire Date</th></tr>";

        while ($row = mysqli_fetch_assoc($result))
        {
            $employeeId = $row['emp_no'];

            echo "<tr><td>" . $row["emp_no"] . "</td><td>" . $row["birth_date"] . "</td><td>" . $row["first_name"] . "</td><td>" .
                 $row["last_name"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["hire_date"] . "</td><td>" .
                "<form id='updateEmployee' name='updateEmployee' method='post' action='UpdateEmployee.php'>
                    <input hidden type='text' id='employeeId' name='employeeId' value='$employeeId' />
                    <input type='submit' id='submit' value='Edit'/>
                 </form></td><td>" .
                "<form id='deleteEmployee' name='deleteEmployee' method='post' action='ConfirmDelete.php'>
                    <input hidden type='text' id='employeeId' name='employeeId' value='$employeeId' />
                    <input type='submit' id='submit' value='Delete'/>
                  </form></td></tr>";
        }
    }

    mysqli_close($conn);
?>


<style>
    th, td {
        border: 2px solid forestgreen;
    }
    table {
        border: 2px solid black;
    }
</style>