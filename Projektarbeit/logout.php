<?php
session_start();
// destroy session (Entfernt die user_id)
session_destroy();

// Auf die Startseite zurück leiten
header('Location: startseite.php');
die();
?>