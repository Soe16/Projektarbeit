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
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $user = login($conn);
    $books = getAllBooks($conn);
    $table = matchTable($conn);
} else if (isset($_SESSION["user_id"])) {
    $user = loadUserById($conn, $_SESSION["user_id"]);
    $books = getAllBooks($conn);
    $table = matchTable($conn);

    
} else {
    header('Location: startseite.php');
    die();
}

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
        header('Location: startseite.php');
        die();
    }
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

/**
 * Get All Books from the buecher Table
 * @param $conn
 * @return array
 */
function getAllBooks($conn){
    $sql = "SELECT * FROM buecher;";
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


// 
function matchTable($conn){
    $sql = "SELECT buecher.id, buecher.titel, buecher.autor, buecher.verlag, buecher.zustand, buecher.user_id, user.vorname, user.name
            FROM user
           INNER JOIN buecher ON user.id = buecher.user_id;";
    $result = $conn->query($sql);
    $table=array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $table[]=$row;
        }
    }
    return $table;
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
    <p>Suche dir jetzt dein Buch für das näcshte Modul und erhalte es zu einem verhandelbarem Preis.</p>
</div>
<!--<div class="col-sm-3">
    <div class="panel panel-primary">
        <div class="panel-heading"><b>So viele Möglichkeiten.</b></div>
            <div class="panel-body">
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
                clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua.</p>
            </div>
    </div>
</div>-->
    <div class="vcontainer">
        <?php foreach ($table as $idtable){ ?>
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-2 bcontainer">
                <span class="glyphicon glyphicon-book logo"></span>
            </div>
            <div class="col-sm-4 tcontainer">
                <h4><u><a href="book.php?book_id=<?= $idtable['id']?>&seller_fn=<?= $idtable['vorname']?>&seller_ln=<?= $idtable['name']?>">
                <?php echo $idtable["titel"] ?></a></u></h4>    
                <ul>
                    <li>Autor: <?php echo $idtable["autor"] ?></li>
                    <li>Verlag: <?php echo $idtable["verlag"] ?></li>
                    <li>Zustand: <?php echo $idtable["zustand"]?></li>
                    <li>Reingestellt von: <?php echo $idtable["vorname"] . " " . $idtable["name"]?></li>
                </ul>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
        <?php } ?>
    </div>
    <br>
    <div class="kontaktBox">
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