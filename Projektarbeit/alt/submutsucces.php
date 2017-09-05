<?php
session_start();
// Create connection and check connection
$conn = mysqli_connect("localhost", "root", "", "hsba");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Registrierung

$db = new  mysqli('localhost', 'root', '', 'hsba');
if ($db->connect_error){
    echo $db->connect_error;
}
if (isset($_POST["absenden"])) {

    $vorname = $_POST["vorname"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $passwort = $_POST["passwort"];
    $passwort2 = $_POST["passwort2"];

    $search_user = $db->prepare("SELECT id FROM User WHERE email = ?");
    $search_user->bind_param('s', $email);
    $search_user->execute();
    $search_result = $search_user->get_result();

    if ($search_result->num_rows == 0) {
        if ($passwort == $passwort2){
            $passwort = md5($passwort);
            $insert = $db->prepare("INSERT INTO User (Vorname, Name, email, password) VALUES (?,?,?,?)");
            $insert->bind_param('ssss', $vorname,$name,$email,$passwort);
            $insert->execute();
            if ($insert !== false){
                return($submit);
            }
        }
        else{
            echo "Passwörter stimmen nicht über ein.";
        }
    }
    else{
        echo "Benutzername schon vergeben";
    }

}

?>
<!DOCTYPE html>
<head>
    <title>Tauschbörse</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="hsba.css" rel="stylesheet">
</head>
<body>
<div class="page-header" align="center">
    <img class="imgHeader" src="https://www.hk24.de/image/hhihk24/Bilder_channel/Ausbildung_channel/fallback1423697428376/1142062/uncropped/270/203/207c0625fdaa8f1c6a3a480a9f65197e/VI/data/HSBA_RGB_zentr_2Z_ohneHSBA.jpg" alt="HSBA">
</div>
<div
<?php
    if ($submit == true){

    }
?>
</body>
</html>
