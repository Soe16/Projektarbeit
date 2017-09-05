<?php

include 'anmeldefunktion.php';

if ($user ==! null) {
    $books = getMyBooks($conn);

} else {
    // Ohne Anmeldeinformationen geht es hier nicht weiter!
    header('Location: startseite.php');
    die();
}



function getMyBooks($conn){
    $sql = "SELECT * FROM buecher WHERE id = user_id;";
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
        <div class="col-sm-8">
            <h2>About Company Page</h2>
            <h4>Lorem ipsum..</h4>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
                clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua.</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-book logo"></span>
        </div>
    </div>
</div>
<div class="text-center">
    <h2>Von dir hochgeladene Bücher</h2>
</div>
<div class="vcontainer">
        <?php foreach ($books as $book){ ?>
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-2 bcontainer">
                <span class="glyphicon glyphicon-book logo"></span>
            </div>
            <div class="col-sm-4 tcontainer">
                <b><u><?php echo $book["titel"] ?></u></b>
                <ul>
                    <li> Autor: <?php echo $book["autor"] ?></li>
                    <li> Verlag: <?php echo $book["verlag"] ?></li>
                    <li> Zustand: <?php echo $book["zustand"]?></li>
                    <li> Bid: <?php echo $book["id"]?></li>
                    <li> Uid: <?php echo $book["user_id"]?></li>
                </ul>

            </div>
            <div class="col-sm-3">
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
                    <p>Fan? Drop a note.</p>
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