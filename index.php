<?php
session_start();

if (isset($_SESSION['error'])) {
?>
	<p style="color: red;"><?php echo $_SESSION['error']; ?>
<?php
	unset($_SESSION['error']);
}
?>

<form method="post" action="form_signIn.php">
    <fieldset>
        <legend>Sign In</legend>
        <label for="login">Login</label> : <input type="text" name="login" id="login" placeholder="Cookingly" maxlength="12" autofocus required/>
        </br>
        <label for="password">Password</label> : <input type="password" name="password" id="password" maxlength="8" required/>
        </br>
        <input type="submit" value="Let's Cook!" />
    </fieldset>
</form>
<a href="signUp.php">Create Account</a>

<?php
	if(isset($_SESSION['error'])) {
?>
	<p style="color: red;"><?php echo S_SESSION['error']; ?></p>
<?php
	unset($_SESSION['error']);
}
?>
