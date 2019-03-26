<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 3/25/19
 * Time: 11:11 PM
 */
include ('vendor/autoload.php');
include ('TelegramBot.php');
include ('Weather.php');

$telagramApi = new TelegramBot();
$whetherApi = new Weather();


$update = $telagramApi->getUpdates();

ob_start();
print_r($update);
$textualRepresentation = ob_get_contents();
ob_end_clean();

file_put_contents('log.txt', $textualRepresentation);

$telagramApi->sendMessages($update["message"]["chat"]["id"],'text песни');