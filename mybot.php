﻿<?php
$access_token = 'BIURmxRxxGCW38na4CQnZv7p8bOhHQCjKjKjvfRd/tVM00rSJJOBMwZ11a6KVa+IN3Vwj8tznYvUFsklJFCwqPaHxhjaV4a+CIXv7Ter/pb+OwGqBhcGsfspcMTiJW0nNh6OiSdZ2v+/3XYv2K1XHQdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			if($text == 'hello'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'สวัสดีครัชช'
				];
			}
			if($text == 'poo'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'จ้าาาาาา'
				];
			}
			if($text == 'ทำไมอยู่หรอจ่ะ'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'หายใจอยู่'
				];
			}
			if($text == 'กินข้าวยัง'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'กินแล้วเรียบร้อย คิคิ'
				];
			}
			else if($text == 'test'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'ทดสอบๆ'
				];
			}
		
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
		}
	}
}
echo "OK";
?>
