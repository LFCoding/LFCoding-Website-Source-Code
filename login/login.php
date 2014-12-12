<?php
include('core.php');

	$username = isset($_POST['username']) ? clear($_POST['username']) : false;
	$password = isset($_POST['password']) ? clear($_POST['password']) : false;
	if(empty($username) || empty($password)) {
		echo 'Skriv användarman och lösenord.<br /><br /><a href="javascript:history.back();">Tillbaka</a>';
	} elseif(mysql_num_rows(mysql_query("SELECT * FROM users WHERE username LIKE '$username'")) == 0) {
		echo 'Fel lösenord..<br /><br /><a href="javascript:history.back();">Tillbaka</a>';
	} else {
		$password = md5($password);
		$ip = $_SERVER['REMOTE_ADDR'];
		if(mysql_num_rows(mysql_query("SELECT * FROM users WHERE username LIKE '$username' AND password='$password'")) > 0) {
			$username = mysql_result(mysql_query("SELECT username FROM users WHERE username LIKE '$username'"), 0);
			$userid = mysql_result(mysql_query("SELECT id FROM users WHERE username LIKE '$username'"), 0);
			mysql_query("UPDATE users SET last_login='".time()."', last_ip='$ip' WHERE id='$userid'") or die(mysql_error());
			$_SESSION['username'] = $username;
			$_SESSION['userid'] = $userid;
			header('Location: inloggad.php');
			die("Rätt");
		}
	}

	?>
	<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>LFCoding < Hem</title>
<link href="../main.css" type="text/css" rel="stylesheet"/>
<link href="../menu.css" rel="stylesheet" type="text/css">
<link href="../ImageZoomer.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">
<div id="header">




<img class="marg" style="float: left" src="../img/LFCoding.png" alt="" width="400" height="80"/>

<nav id="nav">
	<div id="nav_wrapper">
		<ul>
			<li><a href="../index.php">Hem</a>
			</li><li><a href="../omoss.php">Om oss</a>
            	<ul>
					<li><a href="../medlemmar.php">Medlemmar</a>
                   	</li>
                </ul>
            </li><li><a href="../kodning.php">Kodning</a>
            </li><li><a href="../medlemskap.php">Medlemskap</a>
            </li><li><a href="../kontakt.php">Kontakt</a>
            </li><li><a href="../tjanster.php">Tjänster</a>
            </li><li><a href="../login.php">Logga in</a>
            </li>
        </ul>
	</div>
</nav>
<div id="body_wrapper">
<div id="Text">
<h3 class="login">Inloggning</b>

<form name="form1" method="POST" >
  <table width="600" border="0">
  <tbody>

    <tr>
    <td><b class="login">Användarnamn:</b></td>
       <td><input type="text" required="required" id="username"></td>
    </tr>
    <tr>
    <td><b class="login">Lösenord:</b></td>
      <td><input type="password" required="required" id="password"></td>
      	 
    </tr>
    <td>
    <tr>
      <td><input type="submit" id="SubmitUserForm"></td>
    </tr>
  </tbody>
</table>

</form>
<h6 class="login">Inget konto? <a href="../register.php">Registrera!</a></h6>

<div id="BottomText"></div>
</div>


<footer id="Bottom">
<p>© Lounterr & Fillefixsweden "LFCoding" 2014</p>
</footer>
</div>
</div>
</body>
</html>


