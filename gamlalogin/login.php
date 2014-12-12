<?php
include algor.php;

$connection = mysql_connect("sql2.freemysqlhosting.net", "sql260583", "vK3!xJ9!") or die("Couldn't connect.");
mysql_select_db("sql260583", $connection) or die("Database connection failed");

if ($logged==true){
	die("Redan inloggad!");	
	
}

if ($_POST['login']){
		if ($_POST['username']&& $_POST['password']){
			$username = mysql_real_escape_string($_POST['username']);
			$password = mysql_real_escape_string(hash("sha512", $_POST['password']));
			$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `Username`='$username'"));
			if ($user == '0'){
				die("Det användarnamnet existerar inte! Skapa ett nu! <a href='login.php'>Tillbaka</a>");
			}
			$salt = hash("sha512", rand() . rand() .rand());
			setcookie("c_user", hash("sha512", $username), time() + 24 * 60 * 60, "/");
			setcookie("c_salt", $salt, time() + 24 * 60 * 60, "/");
			$userID = $user['ID'];
			mysql_query("UPDATE `users` SET `Salt`='$salt' WHERE `ID`='$userID'");
			print("Inloggad");
			
		}
	
}



?>

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
                	<td><strong class="login">Anv. namn:</strong></td>
            		<td><input type="text" name="username"/></td>
                </tr>
                <tr>
                	<td><b class="login">Pass.</b> </td>
					<td><input type="password" name="password"/></td>
				</tr>
                <tr>
                	<td><input class="button" type="submit" value="Login" name="login"/>
                    </td>
                </tr>
            </table>
        </form>
        
        <h6 class="login">Inget konto? <a href="register.php">Registrera!</a></h6>
	</div>
	</div>
    
    </div>
    </div>
    </body>




