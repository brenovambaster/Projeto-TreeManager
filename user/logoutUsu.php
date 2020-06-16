<?php

include('seguranca.php');
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 60);
}
session_destroy();

echo " <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=perfil.php'>";
