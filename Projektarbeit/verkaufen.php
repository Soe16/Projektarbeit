<?php

include 'anmeldefunktion.php';

//Buch in Datenbank laden
$submit = false;
$db = new  mysqli('localhost', 'root', '', 'hsba');
if ($db->connect_error){
    echo $db->connect_error;
}

if (isset($_POST["erstellen"])) {
    $verlag = $_POST["verlag"];
    $titel = $_POST["titel"];
    $autor = $_POST["autor"];
    $zustand = $_POST["optradio"];
    $price = $_POST["price"];
    $adresse = $_POST["adresse"];
    $plz = $_POST["plz"];
    $ort = $_POST["ort"];
    $land =$_POST["land"];
    $beschreibung = $_POST["beschreibung"];
    $user_id = $user["id"];

        $insert = $db->prepare("INSERT INTO buecher (titel, autor, verlag, zustand, price, adresse, plz, ort, land, user_id, beschreibung) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $insert->bind_param('sssssssssis', $titel,$autor,$verlag,$zustand,$price,$adresse,$plz,$ort,$land,$user_id,$beschreibung);
        $insert->execute();
        if ($insert !== false){

            $submit = true;
            $bmassage ="Dein Buch wurde erfolgreich hochgeladen."; 
                    
        }

        else{
            $bmassage="Dein Buch konnte nicht hochgeladen werden.";
        }

    //}

}

//Bild vom Buch hochladen
if (isset($_POST["erstellen"])) {
    bildupload();
}


function bildupload(){

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["erstellen"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        //$temp = explode(".", $_FILES["file"]["name"]);
        //$newfilename = round(microtime(true)) . '.' . end($temp);
        //move_uploaded_file($_FILES["file"]["tmp_name"], "../img/imageDirectory/" . $newfilename);
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
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
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand">Die Bücher Tauschbörse</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="hauptseite.php">Home</a> </li>
            <li><a href="konto.php">Konto</a> </li>
            <li class="active"><a href="verkaufen.php">Bücher verkaufen</a> </li>
            <li><a href="unterhaltung.php">Unterhaltung</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a class="nav navbar-nav"><?php echo $user["vorname"], " ", $user["name"]?></a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a> </li>
        </ul>
    </div>
</nav>
<div class="jumbotron text-center">
    <h3>Verkaufe jetzt deine ungenutzten Bücher</h3>
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
<div class="row">
    <div class="col-md-2 col-sm-2"></div>
    <div class="container-fluid col-md-8 col-sm-8">
        <div class="container loginbox">
            <div class="panel panel-primary">
                <div class="panel-heading"><b>Buch anbieten</b></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="verkaufen.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-sm-2 col-md-2" for="verlag">Verlag:</label>
                            <div class="col-sm-10 col-md-10">
                                <input type="text" class="form-control" name="verlag" placeholder="Verlag" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2 col-md-2" for="titel">Titel:</label>
                            <div class="col-sm-10 col-md-10">
                                <input type="text" class="form-control" name="titel" placeholder="Titel (Erscheinungsjahr)"
                                required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2 col-md-2" for="autor">Autor:</label>
                            <div class="col-sm-10 col-md-10">
                                <input type="text" class="form-control" name="autor" placeholder="Hauptautor"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2 col-md-2" for="zustand">Zustand:</label>
                            <div class="col-sm-10 col-md-10">
                                <div class="radio">
                                    <label><input type="radio" name="optradio" value="Sehr gut">Sehr gut</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="optradio" value="Gut">Gut</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="optradio" value="OK">OK</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2 col-md-2" for="autor">Preis:</label>
                            <div class="col-sm-4 col-md-4">
                                <input type="text" class="form-control" name="price" placeholder="Preisvorstellung"required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-sm-2 col-md-2" for="autor">Adresse:</label>
                            <div class="col-sm-4 col-md-4">
                                <input type="text" class="form-control" name="adresse" placeholder="Abholadresse"required>
                            </div>
                            <label class="control-label col-sm-2 col-md-2" for="autor">PLZ:</label>
                            <div class="col-sm-2 col-md-2">
                                <input type="text" class="form-control" name="plz" placeholder="PLZ"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2 col-md-2" for="autor">Land:</label>
                            <div class="col-sm-4 col-md-4">
                                <input type="text" class="form-control" name="land" placeholder="Land"required>
                            </div>
                            <label class="control-label col-sm-1 col-md-1" for="autor">Ort:</label>
                            <div class="col-sm-3 col-md-3">
                                <input type="text" class="form-control" name="ort" placeholder="Ort"required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-sm-5 col-md-6" for="beschreibung">Kurze Beschreibung des Buchs: </label>
                            <div class="col-sm-12 col-md-12">
                                <textarea type="text" class="form-control" name="beschreibung" placeholder="Das Buch behandelt das Thema..." rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-6 col-md-6" for="autor">Lade ein Foto des Buches hoch: </label>
                            <b>
                            <div class="col-sm-10 col-md-10">
                                <input type="file" name="fileToUpload" id="fileToUpload" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div align="center">
                                <button type="submit" name="erstellen" class="btn btn-primary" value="Upload Image">Hochladen</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer ">
                    <?php if (isset ($_POST["erstellen"])){
                        echo $bmassage;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-ms-2"></div>
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
                <form action="mailto: soeren.spiegel@myhsba.de" method="post">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 form-group">
                            <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                        </div>
                        <div class="col-sm-6 col-md-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                        </div>
                    </div>
                    <textarea class="form-control" id="comments" name="comments" placeholder="Kommentar" rows="5"></textarea>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 form-group">
                            <button class="btn pull-right" type="submit">Senden</button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>
</body>
</html>