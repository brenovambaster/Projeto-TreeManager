<?php
session_start();
if (!isset($_SESSION['validarSessao']))
echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php'>";

function mysql_fix_string($conn, $string){
  if (get_magic_quotes_gpc()) $string = stripslashes($string);
  return $conn->real_escape_string($string);
}

function hashandsalt($string, $conn){
  return mysql_fix_string($conn, crypt($string, '$5$rounds=9000$gerencia_arvo'));
}
?>