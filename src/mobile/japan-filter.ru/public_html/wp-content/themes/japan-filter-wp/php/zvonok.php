<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/roistatSend.php';

if (isset($_POST['zvonok-name'])) {$zvonok_name = $_POST['zvonok-name'];}
if (isset($_POST['zvonok-phone'])) {$zvonok_phone = $_POST['zvonok-phone'];}
    $comment = 'Телефон: '.$zvonok_phone."\r\n";
    $rs = new roistatSend('Форма "Обратный звонок"', $comment, $zvonok_name, '', $zvonok_phone);
    $product[] = array(
        'uuid'     =>'df842c40-532f-11e6-7a69-93a70008f26a',
        'count'    => '1',
        'discount' => '0',
        'vat'      => '0',
        'sum'      => '0',
    );
	$to = "Porofix@yandex.ru";
	$headers = "Content-type: text/plain; charset =utf-8";
	$subject = "japan-filter.ru [ОБРАТНЫЙ ЗВОНОК]";
	$message = "Имя - $zvonok_name
				Телефон - $zvonok_phone";
	$send = mail($to, $subject, $message, $headers);
	if ($send == 'true'){
		echo ("Спасибо! В ближайшее время с Вами<br>свяжется наш специалист.<br>Мы работаем с 9 до 21 по Мск.");
        $rs->send($product);
	} else {
		echo "<p><b>Ошибка. Сообщение не отправлено!";
	}
?>