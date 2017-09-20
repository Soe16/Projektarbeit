<?php
    session_start();

    if (isset($_GET['fehler'])){
        echo "<div class=\"alert alert-danger\">
                <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                <strong>Fehler!</strong> Der User existiert nicht oder das Passwort ist falsch.</div>";
    }

?>
<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
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
    <div id="startseite">
        <div class="jumbotron text-center">
            <h1>Die Tauschbörse für Bücher</h1>
            <p>Günstig Bücher kaufen</p>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-3"></div>
            <div class="container-fluid col-md-8 col-sm-6">
                <div class=" container loginbox">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center"><b>Login</b></div>
                        <div class="panel-body">
                            <form method="post" action="hauptseite.php">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-lock"></i>
                                        </span>
                                        <input type="password" name="password" class="form-control" placeholder="Passwort">
                                    </div>
                                </div>
                                <button type="submit" value="senden" class="btn btn-primary btn-block">Let´s go</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-3"></div>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-3"></div>
            <div class="container-fluid col-md-8 col-sm-6">
                <div class="container submitbox">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center"><b>Registrierung</b></div>
                        <div class="panel-body">
                            <form method="post" action="submitsucces.php">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input type="text" name="vorname" class="form-control" placeholder="Vorname" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input type="text" name="name" class="form-control" placeholder="Nachname"required>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon1">@</span>
                                        <input id="email" type="text" name="email" class="form-control" placeholder="Email"
                                           required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-lock"></i>
                                        </span>
                                        <input id="pw" type="password" name="passwort" class="form-control" placeholder="Passwort"
                                           required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-lock"></i>
                                        </span>
                                        <input type="password" name="passwort2" class="form-control" placeholder="Passwort wiederholen"
                                           required>
                                    </div>
                                </div>
                                <button type="submit" name="absenden" value="absenden" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        </div>
                        <div class="panel-footer ">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-3"></div>
        </div>
        <div class="container text-center" id="einfText">
            <h2>Die Tauschbörse für Bücher</h2>
            <h3><em>Für Studenten die nicht jedes Buch neu kaufen wollen.</em></h3>
            <br>
            <p><b>Die Tauschbörse für Bücher</b> bietet Studenten die Möglichkeit nicht jedes Buch für die Universität mit
            viel Geld neuzukaufen, sonder von anderen Usern wissenschaftliche Literatur, welche für die Vorlesungen unabdingbar sind,
            zukaufen. So können junge Studenten Geld spaaren oder mit teuer gekauften Bücher, etwas von dem Geld wiederbekommen. </p>
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