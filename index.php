<?php

//connect mysql in PHP
$con = new mysqli('localhost', 'root', '', 'php');

if($con->connect_error){
    die("connection filed:" . $con->connect_error);
}

// create a table in mysql using php
$sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        age_year VARCHAR(100) NOT NULL,
        age_month VARCHAR(100) NOT NULL,
        age_day VARCHAR(100) NOT NULL
    )";

if($con->query($sql) === TRUE){
    echo "table is created successfully";
} else {
    echo "got error: " . $con->error;
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>AGE calculator</h2>

    <form action="output.php" method="post">
        <lable>Enter your name:</lable>
        <input type="text" name="name" id="name">
        <lable>Enter your birth date:</lable>
        <input type="date" name="age" id="age">
        <button type="submit" value="save">Save</button>
    </form>
</body>
</html>