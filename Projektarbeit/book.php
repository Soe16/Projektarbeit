<?php

include 'anmeldefunktion.php';

if ($user ==! null) {
    $book = getBook($conn);
    $latlng = getAdr($book);
    if (isset($_POST["bSenden"])) {
        $bewertung = saveBewertung($conn, $user, $book);
    }

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
                <li><a href="konto.php">Konto</a> </li>
                <li><a href="verkaufen.php">Bücher verkaufen</a> </li>
                <li class="active"><a href="book.php">Buchübersicht</a></li>
                <li><a href="unterhaltung.php">Unterhaltung</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a class="nav navbar-nav"><?php echo $user["vorname"] . " " . $user["name"]?></a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a> </li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron text-center">
        <h2><?= $book['titel'];?></h2>
    </div>
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="uploads/book.png" class="img-circle" alt="Buch">
        </div>
        <div class="container-fluid col-md-4 blist">
            <h3>Infos über das Buch:</h3>
            <ul class="list-unstyled">
                <li class="">Geschrieben von: <?php echo $book['autor'];?></li>
                <li class="">Erschienen im Verlag: <?php echo $book['verlag'];?></li>
                <li class="">Das Buch kostet: <?php echo $book['price'];?></li>
                <li class="">Der Zustand ist <?php echo $book['zustand'].".";?></li>
                <li class="">Adresee: <?php echo $book['adresse'] . " / " .$book['plz']. ", " .$book["ort"];?></li>
            </ul>
            <h4>Beschreibung des Buches:</h4>
             <p><?php echo $book['beschreibung']?></p>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-2 blist">
            <h3>Interesse am Buch?</h3>
            <h5>Dann schreibe jetzt <a href="unterhaltung.php?user_id=<?= $user['id']?>&chat_user=<?= $book['user_id']?>">
                    <?php echo $_GET['seller_fn']. " ".$_GET['seller_ln']?></a> an.</h5>
            <h5>Jetzt anschreiben.<a href="book.php?seller_id=<?= $idtable['seller_id'] ?>"></a>
            <h4>Du hattest schon Kontakt mit dem User?</h4>
            <h5>Dann klicke unten auf den Button Bewertung.</h5>
            <button class="btn btn-default" id="myBtn">Bewertung</button>
            <br>

        </div>
        <div class="col-md-1"></div>
    </div>
    <br>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="panel panel-default">
                <div class="panel-heading">Bewertung 
                    <span class="close">&times;</span>
                </div>
                <div class="panel-body">
                    <h5>Danke, dass du dir die Zeit nimmst und <?= $_GET['seller_fn']?> bewertest.</h5>
                    <form method="post" action="book.php?book_id=<?= $_GET['book_id']?>&seller_fn=<?= $_GET['seller_fn']?>&seller_ln=<?= $_GET['seller_ln']?>">
                        <div class="form-group stars">
                            <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                            <label class="star star-1" for="star-1"></label>
                        </div>
                        <div class="form-group">
                            <label for="password">Kommentar zum User</label>
                            <textarea type="text" class="form-control" name="kommentar" value="kommentar" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                        </div>
                        <button type="submit" name= "bSenden" value="bSenden" class="btn btn-primary">Abschicken</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>

    <div class="text-center">
        <h1>Gucke dir den Abholort auf der Karte an.</h1>

        <div id="googleMap"></div>

        <script>
        function myMap() {
            var myCenter = new google.maps.LatLng(<?= $latlng ?>);
            var mapCanvas = document.getElementById("googleMap");
            var mapOptions = {center: myCenter, zoom: 15};
            var map = new google.maps.Map(mapCanvas, mapOptions);
            var marker = new google.maps.Marker({position:myCenter});
            marker.setMap(map); 
        }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCw8X6KFWXSnjf5N9KlM9Pe__X66_YQYXE&callback=myMap"></script>
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

function getBook($conn){

    $sql = "SELECT * FROM buecher WHERE id = ".$_GET["book_id"].";";
    //$result = $conn->query($sql);
    $book=array();

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($book = mysqli_fetch_assoc($result)) {
            return $book;
        }
    } else {
        echo " kein Ergebnis ;( ";
    }

}

function getAdr($book){
    $address = $book['adresse'].", ".$book['ort'].", ".$book['land'];
    $prepAdr = str_replace(' ','+', $address);
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAdr.'&sensor=false');
    $output = json_decode($geocode);
    $lat = $output->results[0]->geometry->location->lat;
    $long = $output->results[0]->geometry->location->lng;
    $LatLng = $lat.",".$long;
   
    return $LatLng;
    
}

function saveBewertung($conn, $user, $book){

        $star = $_POST["star"];
        $kommentar = $_POST["kommentar"];
        $user_id = $user["id"];
        $seller = $book["user_id"];


        $insert = $conn->prepare("INSERT INTO bewertung (star, user_id, kommentar, seller) VALUES (?,?,?,?)");
        $insert->bind_param('iisi', $star,$user_id,$kommentar,$seller);
        $insert->execute();
        if ($insert !== false){

            //echo "<h2>Danke für deine Bewertung!</h2>"; 
            $message = "Danke für deine Bewertung.";
                    
        }

        else{
            $message = "Leider gab es bei der Bewertung ein Problem und sie konnte";
        }  
}
?>