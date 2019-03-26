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

        $bot->command('start', function ($message) use ($bot) {
            $answer = 'Добро пожаловать!';
            $bot->sendMessage($message->getChat()->getId(), $answer);
        });


        $bot->command('help', function ($message) use ($bot) {
            $answer = 'Команды';
            $bot->sendMessage($message->getChat()->getId(), $answer);
        });

        $bot->run();
    }

}