<?php

session_start();
// Create connection and check connection
$conn = mysqli_connect("localhost", "root", "", "hsba");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Prüfen ob User angemeldet ist
$user = null;

if (isset($_SESSION["user_id"])) {
    $user = loadUserById($conn, $_SESSION["user_id"]);
} else {
    // Ohne Anmeldeinformationen geht es hier nicht weiter!
    header('Location: startseite.php');
    die();
}


function loadUserById($conn, $user_id) {
    $sql = "SELECT * FROM `user` WHERE `id` = '$user_id'";
    $result = mysqli_query($conn, $sql);

    // Prüfen ob ein Ergebnis zurück kam
    if ($result && $user = mysqli_fetch_assoc($result)) {
        return $user;
    } else {
        // Wenn user nicht gefunden wird, zur startseite zurück
        header('Location: startseite.php');
        die();
    }
}
?>