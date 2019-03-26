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

    protected function query($method, $params = [])
    {
        $bot = new \TelegramBot\Api\Client($this->token);

        $bot->command('start', function ($message) use ($bot) {
            $answer = 'Добро пожаловать!';
            $bot->sendMessage($message->getChat()->getId(), $answer);
        });

        $bot->run();

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

        $response = $this->query('getUpdates',[
            'offset' => $this->updateId + 1
        ]);

        if(!empty($response->result)) {
            $this->updateId = $response->result[count($response->result) - 1]->update_id;
        }

        return $response->result;
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