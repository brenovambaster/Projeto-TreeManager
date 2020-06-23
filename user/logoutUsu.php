<?php

include_once('seguranca.php');
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 60*60*24*30);
}
session_destroy();
echo " <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php'>";
