<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 3/26/19
 * Time: 12:51 AM
 */
use GuzzleHttp\Client;

class Weather
{
    protected $token = '92c25096b1dbb685a5ec5da042d3bdcc';

    public function getWeather($lat, $lon) {

        $url = 'api.openweathermap.org/data/2.5/weather';

        $params = [];
        $params['lat'] = $lat;
        $params['lon'] = $lon;
        $params['APPID'] = $this->token;

        $url .= '?' .  http_build_query($params);
        $client = new Client([
            'base_uri' => $url
        ]);

        $result = $client->request('GET');


        return json_decode($result->getBody());
    }
}