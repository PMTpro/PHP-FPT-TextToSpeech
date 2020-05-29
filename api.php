<?php

header('Access-Control-Allow-Origin: *');
 
$content = isset($_POST['content']) ? $_POST['content'] : '';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.fpt.ai/hmi/tts/v5',
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  
  // Content
  
  CURLOPT_POSTFIELDS => $content,
  
  // Content END
  
  CURLOPT_HTTPHEADER => array(
    'api-key: keycuatoi', // key của bạn ở đây. VD: keycuatoi
    'speed: 0',
    'voice: banmai',
    'format: mp3'
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo 'cURL Error #:' . $err;
} else {
    header('Content-type: application/json');
    
    echo $response;
}
