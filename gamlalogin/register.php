    <?php


$connection = mysql_connect("sql2.freemysqlhosting.net", "sql260583", "vK3!xJ9!") or die("Couldn't connect.");
mysql_select_db("sql260583", $connection) or die("Database connection failed");

if ($_POST['register']){
		if ($_POST['username']&& $_POST['password']){
			$username = mysql_real_escape_string($_POST['username']);
			$password = mysql_real_escape_string(hash("sha512", $_POST['password']));
			$name = '';
			if ($_POST['name']){
							$name = mysql_real_escape_string(strip_tags($_POST['name']));

			}
			$check = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `Username`='$username'"));
			if ($check != '0'){
				die("Det anv.namnet finns redan. Prova <i>$username" . rand(1,50) . "</i> istället!  <a href='login.php'>Tillbaka!</a>");	
			}
			
			if (!ctype_alnum($username)){
				die("Anv.namnet har tecken som inte funkar!  <a href='login.php'>Tillbaka!</a>");	
			}
			
			if (strlen($username) > 20){
				die("Anv.namnet kan inte ha 20+ tecken.  <a href='login.php'>Tillbaka!</a>");	
			}
			
			$salt = hash("sha512", rand() . rand() .rand());

			mysql_query("INSERT INTO `users` (`Username`, `Password`, `Name`, `Salt`) VALUES ('$username', '$password', '$name', '$name')");
			setcookie("c_user", hash("sha512", $username), time() + 24 * 60 * 60, "/");
			setcookie("c_salt", $salt, time() + 24 * 60 * 60, "/");
			die("Skapat! Nu inloggad");
}
}
?>
<html>
<head>

<meta charset="utf-8">
<link href="styles/main.css" type="text/css" rel="stylesheet"/>
<link href="styles/menu.css" rel="stylesheet" type="text/css">
<link href="styles/ImageZoomer.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">
<div id="header">




<img class="marg" style="float: left" src="img/LFCoding.png" alt="" width="400" height="80"/>

<nav id="nav">
	<div id="nav_wrapper">
		<ul>
			<li><a href="index.php">Hem</a>
			</li><li><a href="omoss.php">Om oss</a>
            	<ul>
					<li><a href="medlemmar.php">Medlemmar</a>
                   	</li>
                </ul>
            </li><li><a href="kodning.php">Kodning</a>
            </li><li><a href="medlemskap.php">Medlemskap</a>
            </li><li><a href="kontakt.php">Kontakt</a>
            </li><li><a href="tjanster.php">Tjänster</a>
            </li>
        </ul>
	</div>
</nav>
	<div id="body_wrapper">
	<div id="login">
		<h1>Logga in</h1>
		<form action='' method='post'>
        	<table>
            	<tr>
                	<td><b class="login">Anv. namn:</b></td>
            		<td><input type="text" name="username"/></td>
                </tr>
                <tr>
                	<td><b class="login">Pass.</b> </td>
					<td><input type="password" name="password"/></td>
				</tr>
                <tr>
                	<td><b class="login">Namn:</b> </td>
					<td><input type="text" name="name"/></td>
				</tr>
                <tr>
                	<td><input class="button" type="submit" value="Registrera" name="register"/>
                    </td>
                </tr>
            </table>
        </form>
        
	</div>
	</div>
    
    </div>
    </div>
    </body>
    





