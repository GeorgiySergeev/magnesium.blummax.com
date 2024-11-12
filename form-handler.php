<?php
session_start();
date_default_timezone_set('Europe/Kiev');

$product = 'Magnesium Glycinate';
$product_id = '';
$price = '699';

$comment = isset($_POST['comment']) ? $_POST['comment'] : '';
$order_id = number_format(round(microtime(true) * 10), 0, '.', '');

$name = trim(strip_tags($_POST["name"]));
$phone = trim(strip_tags($_POST["phone"]));
$count = trim(strip_tags($_POST["count"]) ? $_POST['count'] : 1);



// test
$tg_bot_token = "";
$chat_id = "";



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text = '';
    $text .= "\n\n" . 'Заказ №: ' . $order_id;
    $text .= "\n\n" . 'Наименование товара:' . "\n" . $product;
    $text .= "\n\n" . 'Имя: ' . $name;
    $text .= "\n\n" . 'Телефон: ' . $phone;
    $text .= "\n\n" . 'Количество: ' . $count;
    $text .= "\n\n" . 'Заявка с сайта: ' . $_SERVER['HTTP_REFERER'];
    $text .= "\n\n" . date('d.m.y H:i:s');
    $text .= "\n" . $_SERVER['REMOTE_ADDR'];

    $param = [
        "chat_id" => $chat_id,
        "text" => $text
    ];

    $url = "https://api.telegram.org/bot" . $tg_bot_token . "/sendMessage?" . http_build_query($param);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ["chat_id" => $chat_id]);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $out = curl_exec($ch);
    curl_close($ch);

    // Сохранение данных в сессии
    $_SESSION['name'] = htmlspecialchars($name);
    $_SESSION['phone'] = htmlspecialchars($phone);
    $_SESSION['order_id'] = $order_id;

    $query_string = $_SERVER['QUERY_STRING'];

    header('Location: thank-you.php?status=success?' . $query_string);
    exit();
}
