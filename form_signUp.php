<?php
session_start();
#------------------------------------------------------------
$host = 'localhost';
$db   = 'galiixy';
$user = 'galiixy';
$pass = 'Jobslpxi';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
#Log to DATABASE
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
#-----------------------------------------------------------
$email = $_POST['email'];
$res = $pdo->query("Select * from User where email = '$email'")->fetchAll();
if (count($res) != 0)
{
    $_SESSION['error']='user already exist !!!!';
    header('Location: /signUp.php');
    exit();
}
else {
	#Data recovery
	$login = $_POST['login'];
	$password=$_POST['password'];
	$last_name=$_POST['last_name'];
	$first_name=$_POST['first_name'];
	#insertion
	$pdo->query("insert into User (login,password,last_name,first_name,email) values ('$login','$password','$last_name','$first_name','$email')");
	header('Location: /fridge.php');
	exit();
}
?>
