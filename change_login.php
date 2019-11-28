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
$cost=5;

#Log to DATABASE
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
 
if(isset($_SESSION['error'])){
?>
	<p style="color: red;"><?php echo $_SESSION['error']; ?></p>
<?php
	unset($_SESSION['error']);
}
$new_login = $_POST['new_login'];
$res = $pdo->query("select * from User where login='$new_login'")->fetchAll();
if(count($res)!=0)
{
	$_SESSION['error']='login already taken';
	header('Location: /change_login.php');
	exit();
}
if ($new_login != null) {
	$pdo->query("update User set login='$new_login' where login='$_SESSION[login]'"); 	
	$_SESSION['login']=$new_login;
	header('Location: /profile.php');
	exit();
}
?>

<p>Current login: <?php echo $_SESSION['login'] ?></p>

<form method="post" action="change_login.php">
	<label>New Login: <input type="text" name="new_login" placeholder="CookDelice" maxlength="12" autofocus required/><label/>
	<input type="submit" value="Update your login"/>
</form>
<p><a href="profile.php">Go to your profile page</a></p>
