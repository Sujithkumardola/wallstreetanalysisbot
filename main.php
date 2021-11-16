
<?php

$token = '2105277243:AAEstwP_0UNazeLM1AXZf3gE22eRxnZEC-4';
$link = 'https://api.telegram.org:443/bot'.$token.'';

$getupdate = file_get_contents('php://input'); // for webhook

$responsearray = json_decode($getupdate, TRUE);

$chatid = $responsearray['message']['chat']['id'];

if ($responsearray['message']['text']=="/start") {
$message = "welcome to @wallstreetanalysisbot \ntext /fetch for prediction";
}
elseif ($responsearray['message']['text']=="/fetch"){
$message = file_get_contents("https://wsasentiapi.herokuapp.com/fetch");
$message = str_replace("<p>","",$message);
$messgae = str_replace("Bullish<p>","Bullish",$message);
$message = str_replace("Bearish</p>","Bearish",$message);
$message = str_replace("</p>","",$message);
}
else {
$message="Invalid command";
}

$parameter = array(
		'chat_id' => $chatid, 
		'text' => $message,
		);
 
$request_url = $link.'/sendMessage?'.http_build_query($parameter); 
 
file_get_contents($request_url);

$parameter = array(
		'chat_id' => $chatid, 
		'text' => "Analyse best stocks to invest into at just $69 for 6 months \nKnow more: https://bit.ly/3cjENwF",
		);
 
$request_url = $link.'/sendMessage?'.http_build_query($parameter); 
 
file_get_contents($request_url);

?>
