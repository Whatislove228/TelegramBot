<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 3/25/19
 * Time: 11:13 PM
 */
use GuzzleHttp\Client;

class TelegramBot
{
    protected  $token = '816935888:AAGiIvEYNyid6fTTmLJn5wpnF4ZV3lfhv4k';

    protected  $updateId;

    public function ddd() {
        $bot = new \TelegramBot\Api\Client($this->token);
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
    }

}