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

$token = "816935888:AAGiIvEYNyid6fTTmLJn5wpnF4ZV3lfhv4k";
$bot = new \TelegramBot\Api\Client($token);
// команда для start
$bot->command('start', function ($message) use ($bot) {
    $answer = 'Добро пожаловать!';
    $bot->sendMessage($message->getChat()->getId(), $answer);
});

// команда для помощи
$bot->command('help', function ($message) use ($bot) {
    $answer = 'Команды:
/help - вывод справки';
    $bot->sendMessage($message->getChat()->getId(), $answer);
});

$bot->run();