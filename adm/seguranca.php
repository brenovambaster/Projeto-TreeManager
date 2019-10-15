<?php
session_start();
if (!isset($_SESSION['validarSessaoAdm']))
  header('Location: loginAdm.php');
?> 