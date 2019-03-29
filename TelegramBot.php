<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 3/25/19
 * Time: 11:13 PM
 */

use \React\EventLoop\Factory;
use \unreal4u\TelegramAPI\HttpClientRequestHandler;
use \unreal4u\TelegramAPI\Telegram\Methods\GetUpdates;
use \unreal4u\TelegramAPI\Abstracts\TraversableCustomType;
use \unreal4u\TelegramAPI\TgLog;
use \unreal4u\TelegramAPI\Telegram\Methods\SetWebhook;
use \unreal4u\TelegramAPI\Telegram\Types\Update;


class TelegramBot
{
    protected  $token = '816935888:AAGiIvEYNyid6fTTmLJn5wpnF4ZV3lfhv4k';

    protected  $updateId;

    protected  $bot_username = 'WeatherUmbrellaBot';

    protected  $hook = 'https://weatheumbreallabot.herokuapp.com/hook.php';
    protected  $setHookUrl = 'https://api.telegram.org/bot816935888:AAGiIvEYNyid6fTTmLJn5wpnF4ZV3lfhv4k/setWebhook?url=https://weatheumbreallabot.herokuapp.com/init.php';
    public function getWebHook() {

        $updateData = json_decode(file_get_contents('php://input'), true);
        file_put_contents('log.txt', $updateData);

        return new Update($updateData);
    }

    protected function query($method, $params = [])
    {
        $url = 'https://api.telegram.org/bot';

        $url .= $this->token;

        $url .= "/" . $method;

        if (!empty($params)) {
            $url .= '?' .  http_build_query($params);
        }
        $client = new Client([
            'base_uri' => $url
        ]);
        $result = $client->request('GET');


        return json_decode($result->getBody());

    }

    public function getUpdates()
    {
        $content    = file_get_contents("php://input");
        $update     = json_decode($content, true);
        return $update;
    }
    public function sendMessages($chat_id, $text)
    {
        $response = $this->query('sendMessage',[
            'text' => $text,
            'chat_id' => $chat_id
        ]);

        return $response;
    }

}