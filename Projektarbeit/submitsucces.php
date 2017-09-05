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

$submit = false;
$anmeldung = null;


if (isset($_POST["absenden"])) {

    $vorname = $_POST["vorname"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $passwort = $_POST["passwort"];
    $passwort2 = $_POST["passwort2"];

    $search_user = $db->prepare("SELECT id FROM user WHERE email = ?");
    $search_user->bind_param('s', $email);
    $search_user->execute();
    $search_result = $search_user->get_result();

    if ($search_result->num_rows == 0) {
        if ($passwort == $passwort2){
            $passwort = md5($passwort);
            $insert = $db->prepare("INSERT INTO user (vorname, name, email, password) VALUES (?,?,?,?)");
            $insert->bind_param('ssss', $vorname,$name,$email,$passwort);
            $insert->execute();
            if ($insert !== false){
                $submit = true;
                $text ="Glückwunsch deine Registrierung war erfolgreich. Klicke auf den Link um zur Startseite zu 
                gelangen und dich anzumelden.";
            }
        }
        else{
            $text = "Die Passwörter stimmen nicht überein, versuche es erneut.";
        }
    }
    else{
        $text = "Unter der Email existiert schon ein User. Versuche es erneut mit einer anderen Email.";
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
<div class="jumbotron text-center">
    <h1>Die Tauschbörse für Bücher</h1>
    <p>Günstig Bücher kaufen</p>
</div>

<div class="panel panel-primary text-center">
    <div class="panel-heading">
        <em>Registrierung</em>
    </div>
    <div class="panel-body">
        <p> <?php echo $text; ?></p><br>
        <a href="startseite.php">Aufgehts</a>
    </div>
</div>

</body>
</html>
