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
$email = $GET['email'];
$res = $pdo->query("Select * from User where email = '$email'");
if ($res <> null)
{
    $_SESSION['error']='user already exist !';
    header('Location : index.php');
    exit();
}
else {
	#Data recovery
	$login = $GET['login'];
	$password=$GET['password'];
	$last_name=$GET['last_name'];
	$first_name=$GET['first_name'];
	#insertion
	$pdo->query("insert into User (login,password,last_name,first_name,email) values ('$login','$password','$last_name','$first_name','$email'));
	header('Location : fridge.php');
	exit();
}
?>
