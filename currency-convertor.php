<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$from = $_GET['from'];
$amount = $_GET['amount'];
$to = $_GET['to'];
if ($from != $to){
    $api_url = 'https://api.exchangeratesapi.io/latest?base='.$from.'&symbols='.$to;
    $ch = curl_init();
    curl_setopt_array(
        $ch, array(
        CURLOPT_URL => $api_url,
        CURLOPT_RETURNTRANSFER => true
    ));
        
    $output = json_decode(curl_exec($ch), true)['rates'][$to];
    
    echo number_format(((float) $output * (float) $amount), 2);
}