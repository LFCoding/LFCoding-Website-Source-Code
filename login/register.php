<?php
include('core.php');
if(isset($_POST['register'])) {
	$username = isset($_POST['username']) ? clear($_POST['username']) : false;
	$password = isset($_POST['password']) ? clear($_POST['password']) : false;
	$email = isset($_POST['email']) ? clear($_POST['email']) : false;
	if(empty($username) || empty($password) || empty($email)) {
		echo 'Skriv i fälten!.<br /><br /><a href="javascript:history.back();">Tillbaka</a>';
	} elseif(strlen($username) > 16) {
		echo 'Max 20 tecken i användarnamnet.<br /><br /><a href="javascript:history.back();">Tillbaka</a>';
	} elseif(strlen($password) < 6 || strlen($password) > 20) {
		echo 'Minst 6, högst 20 bokstäver i lösenordet..<br /><br /><a href="javascript:history.back();">Tillbaka</a>';
	} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo 'Email inte fungerande.';
	} elseif(strlen($email) > 60) {
		echo 'Emailen högst 60 tecken! <br /><br /><a href="javascript:history.back();">Tillbaka</a>';
	} elseif(mysql_num_rows(mysql_query("SELECT * FROM users WHERE username LIKE '$username'")) > 0) {
		echo 'Användarnamnet finns redan!.<br /><br /><a href="javascript:history.back();">Tillbaka</a>';
	} elseif(mysql_num_rows(mysql_query("SELECT * FROM users WHERE email LIKE '$email'")) > 0) {
		echo 'Email finns redan! <br /><br /><a href="javascript:history.back();">Tillbaka</a>';
	} else {
		$password = md5($password);
		$ip = $_SERVER['REMOTE_ADDR'];
		if(mysql_query("INSERT INTO users (username, password, email, reg_ip, last_ip, reg_date) VALUES ('$username','$password','$email','$ip','$ip',UNIX_TIMESTAMP())")) {
			echo 'Registrationen färdig!';
		} else {
			echo 'Fel: '.mysql_error();
		}
	}
} else {
	?>
	<form action="<?php echo $_SERVER['file:///C|/Users/Felix/AppData/Local/Temp/7zE4D38.tmp/PHP_SELF']; ?>" method="POST">
		<label>Username: <input type="text" name="username" required maxlength="16" /></label><br />
		<label>Password: <input type="password" name="password" required maxlength="20" /></label><br />
		<label>Email: <input type="email" name="email" required maxlength="60" /></label><br /><br />
		<input type="submit" name="register" value="Registrati" />
	</form>
	<?php
}
?>