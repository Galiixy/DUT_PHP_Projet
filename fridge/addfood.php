<?php
session_start();

include['maquette/baseConnection.php'];

<?php include ['maquette/header.php'];?>

$name_food = $_POST['name_food'];
$nutriction_fact = $_POST['nutriction_fact'];

$sql ="INSERT INTO FOOD_DEFINITION (name,nutriction_fact," 