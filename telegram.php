<?php

$name = $_POST['client_name']; // получаем имя клиента
$phone = $_POST['client_phone']; // получаем почту клиента


// воодим между кавычек токен бота, который прислал @botfater
$token = "5756595073:AAEPM8Iwb8FiK74_vEGcJb2xtcTDi_JRGBQ"; 
// вставляем номер чата, который можно найти на странице 
// api.telegram.org/botXXXXXXXXX/getUpdates — где XXX это токен бота
$chat_id = "801546223";

// Собираем данные в один массив 
$arr = array(
  'Клиент: ' => $name,
  'Телефон: ' => $phone
);

// составляем сообщение из данных массива
foreach($arr as $key => $value) {
  $txt .= $key."<b> ". urlencode($value)."</b> "."%0A";
};

// даем команду боту отправить сообщение с текстом
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) { 
  return true; // если прошло успешно, возвращаем ответ true
} else {
  return false; // если ошибка, возвращаем false
}
?>