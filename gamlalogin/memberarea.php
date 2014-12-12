<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>LFCoding < Hem</title>
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
            </li><li><a href="login.php">Logga in</a>
            </li>
        </ul>
	</div>
</nav>
<div id="body_wrapper">
<div id="Text">
<p>   


</p>
<?php include login.php;

include algor.php;

if($logged==true){	
print("<p>Du är inloggad som ".$username."!</p>");
}else{
header("Location: login.php");


}
?>


<div id="BottomText"></div>
</div>


<footer id="Bottom">
<p>© Lounterr & Fillefixsweden "LFCoding" 2014</p>
</footer>
</div>
</div>
</body>
</html>
