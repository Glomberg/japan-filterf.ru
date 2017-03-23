<?php
if (isset($_POST['zvonok-name'])) {$zvonok_name = $_POST['zvonok-name'];}
if (isset($_POST['zvonok-phone'])) {$zvonok_phone = $_POST['zvonok-phone'];}
if (isset($_POST['zvonok-message'])) {$zvonok_message = $_POST['zvonok-message'];}
	$to = "Porofix@yandex.ru";
	$headers = "Content-type: text/plain; charset =utf-8";
	$subject = "japan-filter.ru [ОБРАТНЫЙ ЗВОНОК]";
	$message = "Имя - $zvonok_name
				Телефон - $zvonok_phone
				Сообщение - $zvonok_message";
	$send = mail($to, $subject, $message, $headers);
	if ($send == 'true'){
		echo ("Спасибо! В ближайшее время с Вами<br>свяжется наш специалист.<br>Мы работаем с 9 до 21 по Мск.");
	} else {
		echo "<p><b>Ошибка. Сообщение не отправлено!";
	}
?>