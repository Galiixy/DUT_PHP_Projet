<?php
session_start();

#------------------------------------------------------------
include ['./baseConnection.php'];
#-----------------------------------------------------------

$login = $_POST['login'];
$res = $pdo->query("Select * from User where login = '$login'");
if($row = $res->fetch())
{
    if (password_verify($_POST['password'], $row['password'])) {
        $_SESSION['login']=$login;
	header('Location: fridge.php');
	exit();
    } else {
        $_SESSION['error']='invalid login or password';
	header('Location: index.php');
	exit();
    }
}
else
{
    $_SESSION['error']='user does not exist';
    header('Location: index.php');
    exit();
}

?>

