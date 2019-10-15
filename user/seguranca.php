<?php
session_start();
if (!isset($_SESSION['validarSessao']))
  header('Location: loginUsuario.php');
?>