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
    <div class="container loginbox">
        <div class="panel panel-primary">
            <div class="panel-heading"><b>Registrierung</b></div>
            <div class="panel-body">
                <form method="post" action="submitsucces.php">
                    <div class="form-group">
                        <label for="name">Vorname</label>
                        <input type="text" name="vorname" class="form-control" placeholder="Vorname">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Nachname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Passwort</label>
                        <input type="password" name="passwort" class="form-control" placeholder="Passwort">
                    </div>
                    <div class="form-group">
                        <label for="password">Passwort Wiederholen</label>
                        <input type="password" name="passwort2" class="form-control" placeholder="Passwort wiederholen">
                    </div>
                    <button type="submit" name="absenden" value="absenden" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="panel-footer">
                <a href="startseite.php">Zurück</a>
            </div>
        </div>
    </div>

</body>
</html>