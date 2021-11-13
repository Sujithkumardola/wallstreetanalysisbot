
<?php

$token = '2105277243:AAEstwP_0UNazeLM1AXZf3gE22eRxnZEC-4';
$link = 'https://api.telegram.org:443/bot'.$token.'';

$getupdate = file_get_contents('php://input'); // for webhook

$responsearray = json_decode($getupdate, TRUE);

$chatid = $responsearray['message']['chat']['id'];

if ($responsearray['message']['text']=="/start") {
$message = "welcome to bot";
}
else {
message = $responsearray['message']['text'];
}

$parameter = array(
		'chat_id' => $chatid, 
		'text' => $message
		);

$request_url = $link.'/sendMessage?'.http_build_query($parameter); 

file_get_contents($request_url);

?>
