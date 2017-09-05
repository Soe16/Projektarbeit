<?php
    session_start();

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
    <!--<div class="page-header" align="center">
        <img class="imgHeader" src="https://www.hk24.de/image/hhihk24/Bilder_channel/Ausbildung_channel/fallback1423697428376/1142062/uncropped/270/203/207c0625fdaa8f1c6a3a480a9f65197e/VI/data/HSBA_RGB_zentr_2Z_ohneHSBA.jpg" alt="HSBA">
    </div>-->
    <div class="jumbotron text-center">
        <h1>Die Tauschbörse für Bücher</h1>
        <p>Günstig Bücher kaufen</p>
    </div>
    <!--<div class="bildlogin">
        <div class="container loginbox">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><b>Login</b></div>
                <div class="panel-body">
                    <form method="post" action="hauptseite.php">
                        <div class="form-group">
                            <label for="email">User:</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Passwort:</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                        </div>
                        <button type="submit" value="senden" class="btn btn-primary">Let´s go</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="image">
        <img id="bigImage" src="StockSnap_BIB.jpg">
    </div>-->
    <div class="row">
        <div class="col-md-2 col-sm-2"></div>
        <div class="container-fluid col-md-8 col-sm-8">
            <div class=" container loginbox">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center"><b>Login</b></div>
                    <div class="panel-body">
                        <form method="post" action="hauptseite.php">
                            <div class="form-group">
                                <label for="email">User:</label>
                                <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Passwort:</label>
                                <input type="password" name="password" class="form-control" placeholder="Passwort">
                            </div>
                            <div class="form-group">
                            </div>
                            <button type="submit" value="senden" class="btn btn-primary">Let´s go</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-2"></div>
    </div>
    <div class="row"> 
        <div class="col-md-2 "></div>   
        <div class="container-fluid col-md-8">
            <div class="container submitbox">
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>Registrierung</b></div>
                    <div class="panel-body">
                        <form method="post" action="submitsucces.php">
                            <div class="form-group">
                                <label for="name">Vorname</label>
                                <input type="text" name="vorname" class="form-control" placeholder="Vorname" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Nachname"required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="text" name="email" class="form-control" placeholder="Email"
                                       required >
                            </div>
                            <div class="form-group">
                                <label for="password">Passwort</label>
                                <input id="pw" type="password" name="passwort" class="form-control" placeholder="Passwort"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="password">Passwort Wiederholen</label>
                                <input type="password" name="passwort2" class="form-control" placeholder="Passwort wiederholen"
                                       required>
                            </div>
                            <button type="submit" name="absenden" value="absenden" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="panel-footer ">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="container text-center">
        <h3>Die Tauschbörse für Bücher</h3>
        <p><em>Für Studenten die nicht jedes Buch neu kaufen wollen.</em></p>
        <br>
        <p><b>Die Tauschbörse für Bücher</b> bietet Studenten die Möglichkeit nicht jedes Buch für die Universität mit 
        viel Geld neuzukaufen, sonder von anderen Usern wissenschaftliche Literatur, welche für die Vorlesungen unabdingbar sind,
        zukaufen. So können junge Studenten Geld spaaren oder mit teuer gekauften Bücher, etwas von dem Geld wiederbekommen. </p>
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <p><strong>Content</strong></p>
                <img src="http://www.fachportal-paedagogik.de/lotse/paedagogik/00048998.png" class="img-circle buch" alt="Bild">
            </div>
            <div class="col-sm-4 col-md-4">
                <p><strong>Content</strong></p>
                <img src="http://www.fachportal-paedagogik.de/lotse/paedagogik/00048998.png" class="img-circle buch " alt="Bild">
            </div>
            <div class="col-sm-4 col-md-4">
                <p><strong>Content</strong></p>
                <img src="http://www.fachportal-paedagogik.de/lotse/paedagogik/00048998.png" class="img-circle buch" alt="Bild">
            </div>
        </div>
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