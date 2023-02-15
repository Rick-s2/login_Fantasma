<?php

$title = $_POST['title'];
$message = $_POST['textArea'];


if(empty($title) or empty($message)) {
    echo "Escreve algo.";
    exit;
}

if(strlen($title) > 200 or $strlen($message) > 500) {
    echo "muito longo.";
    exit;
}echo $message . ' - ' . $title;
