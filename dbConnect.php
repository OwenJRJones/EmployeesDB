<?php
function getDbConnection(){
    //Establish a db connection
    $conn = mysqli_connect("database", "root", "inet2005", "employees");
    if(!$conn)
    {
        die("Unable to connect to database: " . mysqli_connect_error());
    }

    return $conn;
}
