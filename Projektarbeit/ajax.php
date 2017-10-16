<?php
include 'anmeldefunktion.php';


    $message = $_POST["message"];
    $chat_user_id = $_POST["chat_user_id"];

echo json_encode($_POST);
    $insert = $conn->prepare("INSERT INTO chats (user_id, message, chat_user_id) VALUES (?,?,?)");
    $insert->bind_param('isi', $user['id'],$message,$chat_user_id);
    $insert->execute();
    //echo json_encode(array('status'=>'success','message'=>$message,'chat_user_id'=>$chat_user_id));
?>