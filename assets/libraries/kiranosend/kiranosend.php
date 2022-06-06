<?php

$contentType = $_SERVER['CONTENT_TYPE'] ?? null;
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($contentType !== 'application/x-www-form-urlencoded' && $requestMethod !== 'POST') {
	exit('Доступ запрещен.');
}

$webSite = ''; // Указываем название сайта
$name = $_POST['name'];
$phone = urlencode($_POST['phone']);

$token = "1195077988:AAGYUpfLUgHDNIBjWXNH8dYCCc2XSXizq7k";
$chatId = "-1001376771478"; // chatId - группы "Правки по сайтам - KIRANO"

$arr = [
	'Новая заявка с сайта: ' => $webSite,
	'Имя: ' => $name,
	'Телефон: ' => $phone
];

$message = '';

foreach ($arr as $key => $value) {
	$message .= "<b>" . $key . "</b> " . $value . "%0A";
};

if (trim($name) !== '' && trim($phone) !== '') {
	$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chatId}&parse_mode=html&text={$message}", "r");

	// Раскомментировать перед выгрузкой на сервер
	// $ch = curl_init();
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// curl_setopt($ch, CURLOPT_URL, "https://kiranowork.uz/big-data.php");
	// curl_setopt($ch, CURLOPT_POST, 1);
	// curl_setopt(
	// 	$ch,
	// 	CURLOPT_POSTFIELDS,
	// 	http_build_query([
	// 		'website' => $webSite,
	// 		'name' => $name,
	// 		'phone' => $phone,
	// 		'domain' => $_SERVER['SERVER_NAME']
	// 	])
	// );

	// curl_exec($ch);
	// curl_close($ch);
}

if ($sendToTelegram) {
	header('Location: /redirects/success.php');
} else {
	header('Location: /redirects/error.php');
}
