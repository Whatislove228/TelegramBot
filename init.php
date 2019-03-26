<?php

$data = json_decode(file_get_contents('php://input'));


$file = 'people.txt';


$current .= "John Smith\n";

file_put_contents($file, $data);