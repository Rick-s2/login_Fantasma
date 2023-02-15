<?php
include_once("login_verif.php");
include_once("model/message.php");
include_once("model/register_messages.php");
include_once("controller/message_controller.php");

$title = $_POST["titulo"];
$message = $_POST['texto'];
$id_usuario = $_SESSION['LoggerUserId'];
$username_Usuario = $_SESSION['LoggedUserName'];

if(empty($title) or empty($message)) {
echo "a";
    exit;
}

$ghostMessage = new Message();
$ghostMessage->setTitle($title);
$ghostMessage->setText($message);



$register = new RegisterMessages($id_usuario, $username_Usuario);
$ghostMessage->setId_usuario($register);
$ghostMessage->setUserName($register);


$ghostCont = new MessageController();
$ghostCont -> save($ghostMessage);
echo "";

