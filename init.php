<?php
define('BOT_TOKEN', '816935888:AAGiIvEYNyid6fTTmLJn5wpnF4ZV3lfhv4k');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

// read incoming info and grab the chatID
$content    = file_get_contents("php://input");
$update     = json_decode($content, true);
$chatID     = $update["message"]["chat"]["id"];
$message    = $update["message"]["text"];

// compose reply
$reply ="";
switch ($message) {
    case "/start":
        $reply =  "Welcome to Siamaks bot. Type /help to see commands";
        break;
    case "/test":
        $reply =  "test complete";
        break;
    case "/hi":
        $reply =  "hey there";
        break;
    case "/help":
        $reply =  "commands: /start , /test , /hi , /help ";
        break;
    default:
        $reply =  "NoNo, I don't understand you";
}

// send reply
$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".$reply;
file_get_contents($sendto);

// Create a debug log.txt to check the response/repy from Telegram in JSON format.
// You can disable it by commenting checkJSON.
checkJSON($chatID,$update);
function checkJSON($chatID,$update){

    $myFile = "log.txt";
    $updateArray = print_r($update,TRUE);
    $fh = fopen($myFile, 'a') or die("can't open file");
    fwrite($fh, $chatID ."nn");
    fwrite($fh, $updateArray."nn");
    fclose($fh);
}