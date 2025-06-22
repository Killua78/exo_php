<?php
session_start();
// session_destroy(); pour supprimer toute la session
unset($_SESSION['logged_user']); // on ne supprime que l'utilisateur connecté
header("Location: formulaireSESSION.php");
exit;
