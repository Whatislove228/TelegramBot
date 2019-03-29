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
?>
    <h1>хуй</h1>
<?
var_dump($telagramApi->getWebHook());
var_dump($update);

if (isset($update['message']['chat']['id'])) {
    if (isset($update['message']['location'])) {
        $result = $whetherApi->getWeather($update['message']['location']['latitude'], $update['message']['location']['longitude']);
        (int)$int = (int)$result->main->temp - 273.15;
        $int = round($int);
        switch ($result->weather[0]->main) {
            case "Clear":
                $response = "На вулиці безхмарно. Парасолька не потрібна!" . '  Температура повітря ' . $int . ' градусів Цельсія';
                break;
            case  "Clouds":
                $response = "На вулиці хмарно. Парасольку краще взяти!" . '  Температура повітря ' . $int . ' градусів Цельсія';
                break;
            case  "Rain":
                $response = "На вулиці дощ. Візьміть парасольку!" . '  Температура повітря ' . $int . ' градусів Цельсія';
                break;
            default:
                $response = "Оцтань" . '  Температура повітря ' . $int . ' градусів Цельсія';
        }
        $telagramApi->sendMessages($update['message']['chat']['id'], $response);


    } else {
        $telagramApi->sendMessages($update['message']['chat']['id'], 'Отправь локацию');
    }
}

