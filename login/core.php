<?php
session_start();
$db_hostname = 'sql2.freemysqlhosting.net';
$db_username = 'sql260583';
$db_password = 'vK3!xJ9!';
$db_name = 'sql260583';

mysql_select_db($db_name, mysql_connect($db_hostname, $db_username, $db_password)) or die("Kan inte ansluta.".mysql_error());
mysql_query("CREATE TABLE IF NOT EXISTS users (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, username VARCHAR(16) NOT NULL, password VARCHAR(32) NOT NULL, email VARCHAR(60) NOT NULL, reg_ip VARCHAR(20), last_ip VARCHAR(20), reg_date INT NOT NULL, last_login INT)");
function clear($var) {
	return addslashes(htmlspecialchars(trim($var)));
}
?>