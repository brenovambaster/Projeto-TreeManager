<?php
session_start();
if(isset($_GET['params']))
    echo $_SESSION['validarSessao'] . " , " . $_SESSION['email'] . "," . $_SESSION['fone'];