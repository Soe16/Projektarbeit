<?php

include 'anmeldefunktion.php';

if ($user ==! null) {
    $books = getMyBooks($conn,$user);
    $avgRating = getAvgRating($conn, $user);
    $ratings = getAllRatings($conn, $user);

} else {
    // Ohne Anmeldeinformationen geht es hier nicht weiter!
    header('Location: startseite.php');
    die();
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
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand">Die Bücher Tauschbörse</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="hauptseite.php">Home</a> </li>
            <li class="active"><a href="konto.php">Konto</a> </li>
            <li><a href="verkaufen.php">Bücher verkaufen</a> </li>
            <li><a href="unterhaltung.php">Unterhaltung</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a class="nav navbar-nav"><?php echo $user["vorname"] . " " . $user["name"]?></a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a> </li>
        </ul>
    </div>
</nav>
<div class="jumbotron text-center">
    <h3>Kontoübersicht</h3>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 text-center">
            <h3>Du wurdest von <?= $avgRating['COUNT(*)']?> Usern bewertet und hast einen durschnitts Wert von <?= $avgRating['AVG(star)']?> Sernen erhalten.</h3>
            <div class="stars">
                <label class="star star-5" for="star-5"></label>
                <label class="star star-4" for="star-4"></label>
                <label class="star star-3" for="star-3"></label>
                <label class="star star-2" for="star-2"></label>
                <label class="star star-1" for="star-1"></label>
            </div>
            <h3>In der Kontoübersicht werden alle deine Bücher, welche du verkaufen möchstest, angezeigt.</h3>
            <h3>Außerdem kannst du hier dein Bewertung angucken.</h3>
        </div>
    </div>
</div>

<div class="text-center">
    <h2>Von dir hochgeladene Bücher</h2>
</div>
<div class="vcontainer">
        <?php foreach ($books as $book){ ?>
        <div class="row">
            <div class="col-sm-3 col-md-3">
            </div>
            <div class="col-sm-2 col-md-2 bcontainer">
                <span class="glyphicon glyphicon-book logo"></span>
            </div>
            <div class="col-sm-4 col-md-4 tcontainer">
                <b><u><?php echo $book["titel"] ?></u></b>
                <ul class="list-group">
                    <li class="list-group-item"> Autor: <?php echo $book["autor"] ?></li>
                    <li class="list-group-item"> Verlag: <?php echo $book["verlag"] ?></li>
                    <li class="list-group-item"> Zustand: <?php echo $book["zustand"]?></li>
                    <li class="list-group-item"> Preis: <?php echo $book["price"] ?></li>
                    <li class="list-group-item"> Adresse: <?php echo $book["adresse"] . " / " . $book["plz"] . "," . $book["ort"]?></li>
                </ul>    
            </div>
            <div class="col-sm-3 col-md-3">
            </div>
        </div>
        <?php } ?>
</div>
<br>
<br>
    <div class="text-center">
        <h1>Kommentare und Bewertungen</h1>
    </div>

<div class="kommentar">
    <?php foreach ($ratings as $rating){ ?>
        <div class="row">
            <div class="col-sm-4 col-md-4">
            </div>
            <div class="col-sm-4 col-md-4 well">
                <h4>Geschrieben von <?= $rating['vorname'] ?></h4>
                Du hast <b><?= $rating['star'] ?> Sterne</b> erhalten.<br>
                <b>Kommentar:</b> <?php echo $rating["kommentar"] ?>
            </div>
            <div class="col-sm-4 col-md-4">
            </div>
        </div>
    <?php } ?>
</div>
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

<?php
/**
 * @param $conn
 * @param $user
 * @return array
 */
function getMyBooks($conn,$user){

    $sql = "SELECT * FROM buecher WHERE user_id = ".$user['id'].";";
    $result = $conn->query($sql);
    $books=array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $books[]=$row;
        }
    }
    return $books;
}

/**
 * @param $conn
 * @param $user
 * @return mixed
 */
function getAvgRating($conn, $user){
    $sql = "SELECT AVG(star), COUNT(*) FROM bewertung WHERE seller =".$user['id'].";";
    $result = $conn->query($sql);
    $avgRating = array();
    $avgRating = mysqli_fetch_assoc($result);
    return $avgRating;
}

/**
 * get all Raiting include the names of the writer
 * @param $conn
 * @param $user
 * @return array
 */
function getAllRatings($conn,$user){

    //$sql= "SELECT * FROM bewertung WHERE seller =".$user['id'].";";
    $sql="SELECT bewertung.id, bewertung.kommentar, bewertung.seller, bewertung.user_id, bewertung.star, user.vorname, user.name
        FROM user
        INNER JOIN bewertung ON user.id = bewertung.user_id;";
    $result = $conn->query($sql);
    $ratings = array();
    if ($result->num_rows > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $ratings[]=$row;
        }
    }
    return $ratings;
}

?>
