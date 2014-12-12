<?php
include('core.php');
if(isset($_SESSION['username'])) {
	$userid = $_SESSION['userid'];
	$last_login = mysql_result(mysql_query("SELECT last_login FROM users WHERE id='$userid'"), 0);
	echo 'Inloggad, '.$_SESSION['username'].'.<br />senast inloggad '.date('d-m-Y', $last_login).' kl. '.date('H:i', $last_login);
} else {
	header('Location: login.php');
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>LFCoding < Hem</title>
<link href="../styles/main.css" type="text/css" rel="stylesheet"/>
<link href="../styles/menu.css" rel="stylesheet" type="text/css">
<link href="../styles/ImageZoomer.css" rel="stylesheet" type="text/css">
</head>a

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
            </li><li><a href="login.php">Logga in</a>
            </li>
        </ul>
	</div>
</nav>
<div id="body_wrapper">
<div id="Text">
<h1>LFCoding</h1>
<p>Hej!
Detta är våran hemsida där du kan hitta all information om oss och hur man anlitar oss.</p>
<p>Vi bygger hemsidor, kodar java, gör designer och mer!</p>
<p>Hos oss kan du lära dig koda från en html tag till ett program i java.</p>
<p>Läs om hur du kan kontaktar oss på sidan <a href="../kontakt.php">kontakt</a>.</p>

<div id="BottomText"></div>
</div>


<footer id="Bottom">
<p>© Lounterr & Fillefixsweden "LFCoding" 2014</p>
</footer>
</div>
</div>
</body>
</html>
