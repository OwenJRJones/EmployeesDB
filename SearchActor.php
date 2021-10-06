<?php

    require_once("dbConnect.php");
    $conn = getDbConnection();

    $keyword = $_POST['keyword'];

    $result = mysqli_query($conn, "SELECT * FROM employees WHERE first_name LIKE '$keyword%' OR last_name LIKE '$keyword%'");

    if(!$result){
        die("Could not retrieve records from the employees database: ".mysqli_connect_error());
    }

    echo "<table><tr><th>Emp. Number</th><th>Birth Date</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Hire Date</th></tr>";

    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>".$row["emp_no"]."</td><td>".$row["birth_date"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["gender"]."</td><td>".$row["hire_date"]."</td></tr>";
    }


?>

<style>
    th, td {
        border: 1px solid forestgreen;
    }
    table {
        border: 1px solid black;
    }
</style>

<?php mysqli_close($conn);?>