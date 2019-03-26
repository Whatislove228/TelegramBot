<?php

checkJSON($chatID,$update);

function checkJSON($chatID,$update){

    $myFile = "log.txt";
    $updateArray = print_r($update,TRUE);
    $fh = fopen($myFile, 'a') or die("can't open file");
    fwrite($fh, $chatID ."\n\n");
    fwrite($fh, $updateArray."\n\n");
    fclose($fh);
}