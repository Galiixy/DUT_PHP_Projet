<?php
session_start();

if(isset($_SESSION['error'])) {
?>
	<p style="color: red;"><?php echo $_SESSION['error']; ?>

<?php 
	unset($_SESSION['error']);
}
?>

<form method="post" action="form_signUp.php">
	<fieldset>
		<legend>Sign Up</legend>
		<label for="first_name">First Name</label> : <input type="text" name="first_name" id="first_name" placeholder="Cookingly" maxlength="30" autofocus required/>
		</br>
		<label for="last_name">Last Name</label> : <input type="text" name="last_name" id="last_name" placeholder="Delicious" maxlength="30" required/>
		</br>
		<label for="email">Email</label> : <input type="email" name="email" id="email" placeholder="Cookingly@delicious.com" maxlength="50" required/>
		</br>
		<label for="login">Login</label> : <input type="text" name="login" id="login" placeholder="CookDelice" maxlength="12" autofocus required/>
			</br>
		<label for="password">Password</label> : <input type="password" name="password" id="password" maxlength="8" required/>
		</br>
		<label for="password_confirm">Confirm Password</label> : <input type="password" name="password_confirm" id="password_confirm" maxlength="8" required/>
		</br>
		<input type="submit" value="Welcome to your Kitchen!" />
	   </fieldset>
</form>

<?php
	if(empty($_POST["first_name"])) {
?>
	<p style="color: red;">First Name can't be empty</p>
<?php
	}
	if(empty($_POST["last_name"])) {
?>
	<p style="color:red;">Last Name can't be empty</p>
<?php
	}
	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
?>
	<p style="color:red;">Email not valid</p>
<?php
	}
	if(empty($_POST["password"])) {
?>
	<p style="color:red;">Password can't be empty</p>
<?php
	}
	if($_POST["password"]!=$_POST["password_confirm"]){
?>
	<p style="color:red;">Passwords don't match</p>
<?php
	}
?>
