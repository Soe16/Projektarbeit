<?php
session_start();
// Create connection and check connection
$conn = mysqli_connect("localhost", "root", "", "hsba");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Prüfen ob User angemeldet ist / Login überprüfen

$user = null;
$books = null;
$table = null;
$login = false;
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $user = login($conn);
    $books = getAllBooks($conn);
    $login = true;
}
else if (isset($_SESSION["user_id"])) {
    $user = loadUserById($conn, $_SESSION["user_id"]);
    $books = getAllBooks($conn);
} 
else {
    header('Location: startseite.php');
    die();
}

?>

<!DOCTYPE html>
<head>
    <title>Die Tauschbörse</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="hsba.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">Die Bücher Tauschbörse</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="hauptseite.php">Home</a> </li>
                <li><a href="konto.php">Konto</a> </li>
                <li><a href="verkaufen.php">Bücher verkaufen</a> </li>
                <li><a href="unterhaltung.php">Unterhaltung</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a class="nav navbar-nav"><?php echo $user["vorname"], " ", $user["name"]?></a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a> </li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron text-center">
        <h1>Die Bücher Tauschbörse</h1>
        <p>Suche dir jetzt dein Buch für das näcshte Modul und erhalte es zu einem fairen Preis.</p>
    </div>
    <?php if($login == true) {?>
        <div class="container">
            <div class="alert alert-info" id="willkommen">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h3>Hallo <?= $user['vorname']?>,</h3>
                <p> super, dass du dich für diese Seite entschieden hast.
                    Auf der Hauptseite werden dir alle aktuellen Bücher angezeigt,
                    welche zum Verkauf stehen. Wenn du dich für ein Buch interessierts und genauere
                    Informationen über das Buch und den Verkäufer haben möchtest, dann <b>klicke auf den
                        Titel</b> des Buches und du wirst zur Übersicht weitergeleitet.
                </p>
                <h3>Viel Spaß!</h3>
            </div>
        </div>
    <?php } ?>
    <div class="vcontainer">
        <?php foreach ($books as $book){ ?>
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-2 bcontainer">
                <span class="glyphicon glyphicon-book logo"></span>
            </div>
            <div class="col-sm-4 tcontainer">
                <h4><u><a href="book.php?book_id=<?= $book['id']?>&seller_fn=<?= $book['vorname']?>&seller_ln=<?= $book['name']?>">
                <?php echo $book["titel"] ?></a></u></h4>
                <ul class="list-group">
                    <li class="list-group-item">Autor: <?php echo $book["autor"] ?></li>
                    <li class="list-group-item">Verlag: <?php echo $book["verlag"] ?></li>
                    <li class="list-group-item">Zustand: <?php echo $book["zustand"]?></li>
                    <li class="list-group-item">Reingestellt von: <?php echo $book["vorname"] . " " . $book["name"]?></li>
                </ul>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
        <?php } ?>
    </div>
    <br>
    <div class="kontaktBox row">
        <div class="container">
            <h3 class="text-center">Kontakt</h3>
            <p class="text-center"><em></em></p>
            <div class="row test">
                <div class="col-md-4">
                    <p>Dir gefällt die Seite? Dann hinterlasse doch ein Kommentar.</p>
                    <p><span class="glyphicon glyphicon-map-marker"></span>Hamburg, DE</p>
                    <p><span class="glyphicon glyphicon-envelope"></span>Email: soeren.spiegel@myshba.de</p>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                        </div>
                    </div>
                    <textarea class="form-control" id="comments" name="comments" placeholder="Kommentar" rows="5"></textarea>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <button class="btn pull-right" type="submit">Senden</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php


/**
 * Login prüfen
 * @param $conn
 * @return array|null
 */

function login($conn) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $pw = mysqli_real_escape_string($conn, $_POST["password"]);
    $pw = md5($pw);

    $sql = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$pw'";
    $result = mysqli_query($conn, $sql);

    // Prüfen ob ein Ergebnis zurück kam
    if ($result && $user = mysqli_fetch_assoc($result)) {
        $_SESSION["user_id"] = $user["id"];
        return $user;
    } else {
        // Wenn Email +Passwort nicht korrekt sind, dann auf die Startseite zurück
        header('Location: startseite.php?fehler');
        die();
    }
}

/**
 * @param $conn
 * @param $user_id
 * @return array|null
 */
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

/**
 * @param $conn
 * @return array
 */
function getAllBooks($conn){
    $sql = "SELECT buecher.id, buecher.titel, buecher.autor, buecher.verlag, buecher.zustand, buecher.user_id, user.vorname, user.name
        FROM user
        INNER JOIN buecher ON user.id = buecher.user_id;";
    $result = $conn->query($sql);
    $books=array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $books[]=$row;
        }
    }
    return $books;
}

?>