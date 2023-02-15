<?php
include_once("model/message.php");
class MessageHTML {
    public static function CardMaking($messages) {

        foreach ($messages as $message):
       echo' <div class="card"> ';
       echo' <div class="container">';
          echo '<p class="username"><b> ' . $message->getUserName()->getUsernameReg() . '</b></p>';
       echo'<h4 id="title">' . $message->getTitle() . '</h4>
       <hr>';
       echo'<p>' . $message->getText() . '</p>';
      echo '  </div>
      </div> ';
        
        endforeach;

    }
}