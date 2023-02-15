<?php

include_once("util/conexao.php");
include_once("model/message.php");
include_once("model/register_messages.php");

class MessageDAO {

    private const SQL_MESSAGE = "SELECT m.*, u.username AS Username FROM messages m " .
    " JOIN tb_usuario u ON u.id_usuario = m.id_usuario"; 
    
        private function mapMessages($resultSql) {
            $messages = array();
            foreach ($resultSql as $reg):
                $message = new Message();
                $message->setId_message($reg['id_message']);
                $message->setText($reg['message']);
                $message->setTitle($reg['title']);
               
                $register = new RegisterMessages($reg['id_usuario'], $reg['Username']);
                $message->setId_usuario($register);
                $message->setUserName($register);
                array_push($messages, $message);
            endforeach;

            return $messages;
        }
    
    public function showMessage() {
        $conn = conectar_db();

        $sql = MessageDAO::SQL_MESSAGE;
        $stm = $conn->prepare($sql);
        $stm -> execute();
        $result = $stm->fetchAll();

        return $this->mapMessages($result);
    
    }
    public function saveMessage(message $message) {
        $conn = conectar_db();

        $sql = "INSERT INTO messages (title, message, id_usuario, Username)".
            " VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        echo  $message->getUserName()->getUsernameReg();
        $stmt->execute([$message->getText(), $message->getTitle(), 
                        $message->getId_usuario()->getIdUsuarioReg(), $message->getUserName()->getUsernameReg()]);
 

    }
}