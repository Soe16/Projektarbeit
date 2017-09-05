<?php

include 'anmeldefunktion.php';

if ($user ==! null) {
    #$books = getMyBooks($conn,$user);
    #$ratings = getMyRating($conn, $user);

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
            <li><a href="konto.php">Konto</a> </li>
            <li><a href="verkaufen.php">Bücher verkaufen</a> </li>
            <li class="active"><a href="unterhaltung.php">Unterhaltung</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a class="nav navbar-nav"><?php echo $user["vorname"] . " " . $user["name"]?></a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a> </li>
        </ul>
    </div>
</nav>
<div id="wrapper">

        <div id="sidebar-wrapper">
            <nav id="spy">
                <ul class="sidebar-nav nav">
                    <li class="sidebar-brand">
                        <a href="#home"><span class="fa fa-home solo">Deine Chats</span></a>
                    </li>
                    <li>
                        <a href="#anch1" data-scroll>
                            <span class="fa fa-anchor solo">Chat 1</span>
                        </a>
                    </li>
                    <li>
                        <a href="#anch2" data-scroll>
                            <span class="fa fa-anchor solo">Chat 2</span>
                        </a>
                    </li>
                    <li>
                        <a href="#anch3" data-scroll>
                            <span class="fa fa-anchor solo">Chat 3</span>
                        </a>
                    </li>
                    <li>
                        <a href="#anch4" data-scroll>
                            <span class="fa fa-anchor solo">Chat 4</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    <div class="jumbotron text-center">
        <h3>Übersicht deiner Unterhaltungen mit anderen Nutzern</h3>
    </div>

    <div id="page-content-wrapper">
            
                <div class="row">
                    <div class="col-md-12 well">
                        <legend id="anch1">Chat 1</legend>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultricies, metus eget fringilla fermentum, sem justo pulvinar tellus, ac varius neque ante eget mi. Donec cursus nibh ultrices vulputate aliquet. Morbi nulla enim, molestie eu ullamcorper quis, placerat a mauris. Proin vel magna ullamcorper, vulputate leo eu, egestas odio. Vivamus erat leo, egestas in euismod sed, fermentum nec magna. Nunc nisi enim, euismod a tellus sit amet, fermentum adipiscing ipsum. Fusce rhoncus diam ac neque aliquam convallis. Etiam malesuada, nibh id rutrum euismod, enim augue gravida dolor, at vulputate felis mi at magna. Nulla luctus, libero eget luctus gravida, sapien enim varius massa, adipiscing aliquet lacus mi eu eros. Duis pretium laoreet ullamcorper. Aenean in mauris nec libero tincidunt pharetra non et dui. Sed tortor turpis, mollis et tempus eu, auctor laoreet neque. Etiam eu tortor rutrum, rutrum mauris sit amet, hendrerit augue. Sed ut tincidunt nisi. Nam consectetur velit ac pharetra venenatis.</p>
                        <p>Donec pellentesque id quam vel iaculis. Phasellus commodo tempor metus, eget sollicitudin odio ultricies id. Proin sed ipsum quis turpis suscipit luctus vitae id urna. Fusce et rhoncus quam. Etiam vel justo ligula. Nullam euismod lacinia risus a pulvinar. Pellentesque sit amet nisl eget ante vulputate feugiat. Suspendisse venenatis magna nunc, mollis facilisis neque condimentum ac. Vivamus non semper dui. Aenean sed eleifend dui. Vivamus a massa aliquam nibh consectetur luctus id at ligula. Nunc ipsum dolor, mollis at sem et, auctor rhoncus ipsum. Nulla faucibus venenatis est sit amet facilisis. In vestibulum nisi at tellus egestas, in pharetra enim fringilla. In ac erat non magna accumsan aliquam.</p>
                    </div>
                    <div class="col-md-12 well">
                        <legend id="anch2">Chat 2</legend>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultricies, metus eget fringilla fermentum, sem justo pulvinar tellus, ac varius neque ante eget mi. Donec cursus nibh ultrices vulputate aliquet. Morbi nulla enim, molestie eu ullamcorper quis, placerat a mauris. Proin vel magna ullamcorper, vulputate leo eu, egestas odio. Vivamus erat leo, egestas in euismod sed, fermentum nec magna. Nunc nisi enim, euismod a tellus sit amet, fermentum adipiscing ipsum. Fusce rhoncus diam ac neque aliquam convallis. Etiam malesuada, nibh id rutrum euismod, enim augue gravida dolor, at vulputate felis mi at magna. Nulla luctus, libero eget luctus gravida, sapien enim varius massa, adipiscing aliquet lacus mi eu eros. Duis pretium laoreet ullamcorper. Aenean in mauris nec libero tincidunt pharetra non et dui. Sed tortor turpis, mollis et tempus eu, auctor laoreet neque. Etiam eu tortor rutrum, rutrum mauris sit amet, hendrerit augue. Sed ut tincidunt nisi. Nam consectetur velit ac pharetra venenatis.</p>
                        <p>Donec pellentesque id quam vel iaculis. Phasellus commodo tempor metus, eget sollicitudin odio ultricies id. Proin sed ipsum quis turpis suscipit luctus vitae id urna. Fusce et rhoncus quam. Etiam vel justo ligula. Nullam euismod lacinia risus a pulvinar. Pellentesque sit amet nisl eget ante vulputate feugiat. Suspendisse venenatis magna nunc, mollis facilisis neque condimentum ac. Vivamus non semper dui. Aenean sed eleifend dui. Vivamus a massa aliquam nibh consectetur luctus id at ligula. Nunc ipsum dolor, mollis at sem et, auctor rhoncus ipsum. Nulla faucibus venenatis est sit amet facilisis. In vestibulum nisi at tellus egestas, in pharetra enim fringilla. In ac erat non magna accumsan aliquam.</p>
                    </div>
                    <div class="col-md-12 well">
                        <legend id="anch3">Chat 3</legend>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultricies, metus eget fringilla fermentum, sem justo pulvinar tellus, ac varius neque ante eget mi. Donec cursus nibh ultrices vulputate aliquet. Morbi nulla enim, molestie eu ullamcorper quis, placerat a mauris. Proin vel magna ullamcorper, vulputate leo eu, egestas odio. Vivamus erat leo, egestas in euismod sed, fermentum nec magna. Nunc nisi enim, euismod a tellus sit amet, fermentum adipiscing ipsum. Fusce rhoncus diam ac neque aliquam convallis. Etiam malesuada, nibh id rutrum euismod, enim augue gravida dolor, at vulputate felis mi at magna. Nulla luctus, libero eget luctus gravida, sapien enim varius massa, adipiscing aliquet lacus mi eu eros. Duis pretium laoreet ullamcorper. Aenean in mauris nec libero tincidunt pharetra non et dui. Sed tortor turpis, mollis et tempus eu, auctor laoreet neque. Etiam eu tortor rutrum, rutrum mauris sit amet, hendrerit augue. Sed ut tincidunt nisi. Nam consectetur velit ac pharetra venenatis.</p>
                        <p>Donec pellentesque id quam vel iaculis. Phasellus commodo tempor metus, eget sollicitudin odio ultricies id. Proin sed ipsum quis turpis suscipit luctus vitae id urna. Fusce et rhoncus quam. Etiam vel justo ligula. Nullam euismod lacinia risus a pulvinar. Pellentesque sit amet nisl eget ante vulputate feugiat. Suspendisse venenatis magna nunc, mollis facilisis neque condimentum ac. Vivamus non semper dui. Aenean sed eleifend dui. Vivamus a massa aliquam nibh consectetur luctus id at ligula. Nunc ipsum dolor, mollis at sem et, auctor rhoncus ipsum. Nulla faucibus venenatis est sit amet facilisis. In vestibulum nisi at tellus egestas, in pharetra enim fringilla. In ac erat non magna accumsan aliquam.</p>
                    </div>
                    <div class="col-md-12 well">
                        <legend id="anch4">Chat 4</legend>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultricies, metus eget fringilla fermentum, sem justo pulvinar tellus, ac varius neque ante eget mi. Donec cursus nibh ultrices vulputate aliquet. Morbi nulla enim, molestie eu ullamcorper quis, placerat a mauris. Proin vel magna ullamcorper, vulputate leo eu, egestas odio. Vivamus erat leo, egestas in euismod sed, fermentum nec magna. Nunc nisi enim, euismod a tellus sit amet, fermentum adipiscing ipsum. Fusce rhoncus diam ac neque aliquam convallis. Etiam malesuada, nibh id rutrum euismod, enim augue gravida dolor, at vulputate felis mi at magna. Nulla luctus, libero eget luctus gravida, sapien enim varius massa, adipiscing aliquet lacus mi eu eros. Duis pretium laoreet ullamcorper. Aenean in mauris nec libero tincidunt pharetra non et dui. Sed tortor turpis, mollis et tempus eu, auctor laoreet neque. Etiam eu tortor rutrum, rutrum mauris sit amet, hendrerit augue. Sed ut tincidunt nisi. Nam consectetur velit ac pharetra venenatis.</p>
                        <p>Donec pellentesque id quam vel iaculis. Phasellus commodo tempor metus, eget sollicitudin odio ultricies id. Proin sed ipsum quis turpis suscipit luctus vitae id urna. Fusce et rhoncus quam. Etiam vel justo ligula. Nullam euismod lacinia risus a pulvinar. Pellentesque sit amet nisl eget ante vulputate feugiat. Suspendisse venenatis magna nunc, mollis facilisis neque condimentum ac. Vivamus non semper dui. Aenean sed eleifend dui. Vivamus a massa aliquam nibh consectetur luctus id at ligula. Nunc ipsum dolor, mollis at sem et, auctor rhoncus ipsum. Nulla faucibus venenatis est sit amet facilisis. In vestibulum nisi at tellus egestas, in pharetra enim fringilla. In ac erat non magna accumsan aliquam.</p>
                    </div>
                </div>

            </div>
        
        <div class="kontaktBox">
                <div class="container">
                    <h3 class="text-center">Kontakt</h3>
                    <p class="text-center"><em></em></p>
                    <div class="row test">
                        <div class="col-md-4 col-sm-4">
                            <p>Dir gefällt die Seite? Dann hinterlasse doch ein Kommentar.</p>
                            <p><span class="glyphicon glyphicon-map-marker"></span>Hamburg, DE</p>
                            <p><span class="glyphicon glyphicon-envelope"></span>Email: soeren.spiegel@myshba.de</p>
                        </div>
                        <div class="col-md-8 col-sm-8">
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
    </div>
</div>
</body>
</html>