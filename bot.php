<?php

// mini chat by lateral bot

$input = file_get_contents("php://input");
$update = json_decode($input, true);
$printUptade = print_r($update, true);

$chat_id = $update['message']['chat']['id'];
$from_chat_id = $update['message']['from']['id'];
$message_id = $update['message']['message_id'];
$first_name = $update['message']['from']['first_name'];
$username = $update['message']['from']['username'];
$text = $update['message']['text'];
$first_name = $update['message']['chat']['first_name'];
$username = $update['message']['chat']['username'];

define("API_TOKEN", "");

function bot(string $methods, array $params)
{
  $ch = curl_init();
  curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.telegram.org/bot" . API_TOKEN . "/$methods",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $params,
  ]);
  $data = curl_exec($ch);
  curl_close($ch);
  return json_decode($data, true);
};

function sendMessage(int|string $chat_id, string $text, int $message_thread_id = null, string $parse_mode = null, mixed $entities = null, mixed $link_preview_options = null, bool $disable_notification = null, bool $protect_content = null, mixed $reply_parameters = null, mixed $reply_markup = null)
{
  $params = [
    'chat_id' => $chat_id,
    'text' => $text
  ];
  if ($message_thread_id !== null) {
    $params['message_thread_id'] = $message_thread_id;
  }
  if ($parse_mode !== null) {
    $params['parse_mode'] = $parse_mode;
  }
  if ($entities !== null) {
    $params['entities'] = $entities;
  }
  if ($link_preview_options !== null) {
    $params['link_preview_options'] = $link_preview_options;
  }
  if ($disable_notification !== null) {
    $params['disable_notification'] = $disable_notification;
  }
  if ($protect_content !== null) {
    $params['protect_content'] = $protect_content;
  }
  if ($reply_parameters !== null) {
    $params['reply_parameters'] = $reply_parameters;
  }
  if ($reply_markup !== null) {
    $params['reply_markup'] = $reply_markup;
  }

  return bot('sendMessage', $params);
}

function copyMessage(int|string $chat_id, int|string $from_chat_id, int $message_id, int $message_thread_id = null, string $caption = null, string $parse_mode = null, mixed $caption_entities = null, bool $disable_notification = null, bool $protect_content = null, mixed $reply_parameters = null, mixed $reply_markup = null)
{
  $params = [
    'chat_id' => $chat_id,
    'from_chat_id' => $from_chat_id,
    'message_id' => $message_id
  ];

  if ($message_thread_id !== null) {
    $params['message_thread_id'] = $message_thread_id;
  }
  if ($caption !== null) {
    $params['caption'] = $caption;
  }
  if ($parse_mode !== null) {
    $params['parse_mode'] = $parse_mode;
  }
  if ($caption_entities !== null) {
    $params['caption_entities'] = $caption_entities;
  }
  if ($disable_notification !== null) {
    $params['disable_notification'] = $disable_notification;
  }
  if ($protect_content !== null) {
    $params['protect_content'] = $protect_content;
  }
  if ($reply_parameters !== null) {
    $params['reply_parameters'] = $reply_parameters;
  }
  if ($reply_markup !== null) {
    $params['reply_markup'] = $reply_markup;
  }

  return bot('copyMessage', $params);
};


$admin = 000;
$admin2 = 303898395;

$msg = "
😬  یه نفر انگار پیام فرستاده:
🔸  اسم کاربر:
$first_name
🔸  آیدی عددی کاربر:
$from_chat_id
🔸  آیدی کاربر:
@$username
🔸  پیامی که فرستاده:
$text

";

if ($text) {
  if ($text == '/start') {
    $txt = 'لطفا پیام خود را بفرستید!';
    sendMessage(chat_id: $chat_id, text: $txt);
    die();
  } 
  if ($chat_id == $admin2) {
    $Explode = explode("\n", $text); 
    $sendID = $Explode[0];
    $sendMSG = $Explode[1];
    $txt = ' پیام با موفقیت ارسال گردید!';
    sendMessage(chat_id: $sendID, text: $sendMSG);
    sendMessage(chat_id: $admin2, text: $txt);
    die();
  } 
  if($chat_id != $admin2) {
    $txt = 'پیام شما با موفقیت ارسال شد!';
    sendMessage(chat_id: $chat_id, text: $txt);
    sendMessage(chat_id: $admin, text: $msg);
    die();
  }
}

// AtaDevPro