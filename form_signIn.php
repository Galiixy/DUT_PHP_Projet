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
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
#-----------------------------------------------------------

$login = $GET['login'];
$res = $pdo->query("Select * from User where login = '$login'");
if($row = $res->fetch())
{
    if ($row['password'] == $_GET['password']) {
        $_SESSION['login']=$login;
        header('Location : /index.php');
    } else {
        $_SESSION['error']='invalid login or password';
        header('Location: /form.php')
    }
}
else
{
    $_SESSION['error']='user does not exist';
    header('Location : /form.php');
}

?>

