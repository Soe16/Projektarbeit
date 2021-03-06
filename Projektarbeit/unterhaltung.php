<?php

include 'anmeldefunktion.php';

if ($user ==! null) {

    $chats = getChat($conn, $user);

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
                <?php $chat_user=[]; foreach ($chats as $chat){
                    if(!array_key_exists($chat['user_id'],$chat_user)) {
                        ?>
                        <li class="sidebar-brand">
                            <a href="unterhaltung.php?chat_user=<?= $chat['chat_user_id'] ?>" data-id="<?= $chat['chat_user_id'] ?>"
                                    class="chat_users"><span
                                        class="fa fa-home solo"><?= $chat['chat_user_name'] ?></span></a>
                        </li>
                        <?php
                    }$chat_user[$chat['chat_user_id']]=true;
                } ?>
            </ul>
        </nav>
    </div>
    <div class="jumbotron text-center">
        <h3>Übersicht deiner Unterhaltungen mit anderen Nutzern</h3>
    </div>

    <div id="page-content-wrapper">

        <div class="row" >
            <div id="chat_messages">
            <?php foreach ($chats as $chat){
                //echo "<pre>";
                //var_dump($chats);die();
                if($chat['chat_user_id']==$_GET['chat_user'] OR $chat['user_id']==$_GET['chat_user']){
                    $visibility = "block";
                }else{
                    $visibility="none";
                }
                ?>
                <div class="col-md-12 well chat chat_user_<?= $chat['chat_user_id'] ?>" data-chat_id="<?= $chat['id'] ?>" style="display: <?= $visibility?>">
                    <legend><?= $chat['chat_user_name'] ?></legend>
                    <p><?= $chat['message'] ?></p>
                </div>
                <?php
            } ?>
            </div>
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Type your message" id="form_message">
                </div>
                <button type="submit" class="btn btn-default" data-user >Submit</button>
            </form>
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
                    <form>
                        <textarea class="form-control" id="comments" name="comments" placeholder="Kommentar" rows="5"></textarea>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <button class="btn pull-right" type="submit">Senden</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function () {
        var chat_user_id = <?= $_GET['chat_user']?>;
        $('.chat_users').on('click',function (e) {
            $('.chat:visible').toggle();
            chat_user_id= $(this).data('id');
            $('.chat_user_'+chat_user_id).toggle();

        });
        $('form').submit(function (e) {

            e.preventDefault();
            var message=$('#form_message').val();
            $.ajax({url: "ajax.php",data:{message:message, chat_user_id:chat_user_id},type:"POST", success: function(result,status,xhr){
                $('#chat_messages').append('<div class="col-md-12 well chat"><legend>'+chat_user_id+'</legend><p>'+message+'</p></div>');

            }});
        });
    });
</script>
</body>
</html>
<?php
function getChat($conn, $user){

    $sql = "SELECT chats.id, chats.user_id,chats.message,chats.created_at,chats.chat_user_id, user.name as chat_user_name 
            FROM chats join user on chats.user_id = user.id WHERE user_id =".$user["id"]." or chat_user_id = ".$user["id"].";";
    //.$_GET['user_id']." or chat_user_id = ".$_GET['user_id'].";";
    $chats=array();

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $chats[]=$row;
        }

    }return $chats;

}
?>
