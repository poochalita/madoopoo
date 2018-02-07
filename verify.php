<?php
$access_token = 'BIURmxRxxGCW38na4CQnZv7p8bOhHQCjKjKjvfRd/tVM00rSJJOBMwZ11a6KVa+IN3Vwj8tznYvUFsklJFCwqPaHxhjaV4a+CIXv7Ter/pb+OwGqBhcGsfspcMTiJW0nNh6OiSdZ2v+/3XYv2K1XHQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>