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

$telagramApi->ddd();