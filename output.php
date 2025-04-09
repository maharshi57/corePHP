<?php
$birth_date = new DateTime($_POST['age']);
$current_date = new DateTime(date('Y-m-d'));
$name  = $_POST['name'];
$diff = $current_date->diff($birth_date);

//connect mysql in PHP
$con = new mysqli('localhost', 'root', '', 'php');

if($con->connect_error){
    die("connection filed:" . $con->connect_error);
}

// create a table in mysql using php
$sql = "INSERT INTO users (name, age_year, age_month, age_day) VALUES ('$name', '{$diff->y}', '{$diff->m}', '{$diff->d}')";

if($con->query($sql) === TRUE){
    echo "data inserted successfully";
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
    <h2>hello, <?php  echo $name ?> your age is:</h2>
    <h4><?php echo $diff->y . ' years, ' . $diff->m . ' months, ' . $diff->d . ' days only' ?></h4>
</body>
</html>