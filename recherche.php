<?php

$search = str_replace(" ", "%20", $_GET["search"]);
$type = $_GET["select"];

$curl = curl_init("https://images-api.nasa.gov/search?q=$search&media_type=$type");
curl_setopt($curl, CURLOPT_CAINFO, __DIR__ . DIRECTORY_SEPARATOR . 'cer.crt');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($curl);

var_dump("https://images-api.nasa.gov/search?q=$search&media_type=$type");

if ($data === false) {
    var_dump(curl_error($curl));
} else {
    $data = json_decode($data, true);
    var_dump($data['collection']);
}
curl_close($curl);
