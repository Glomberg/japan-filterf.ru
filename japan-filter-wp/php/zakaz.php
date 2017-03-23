<?php
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['adress'])) {$adress = $_POST['adress'];}
if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['city'])) {$city = $_POST['city'];}
if (isset($_POST['nml'])) {$nml = $_POST['nml'];}
if (isset($_POST['psl'])) {$psl = $_POST['psl'];}
if (isset($_POST['nms'])) {$nms = $_POST['nms'];}
if (isset($_POST['pss'])) {$pss = $_POST['pss'];}
if (isset($_POST['summa'])) {$summa = $_POST['summa'];}
if (isset($_POST['sposob'])) {$sposob = $_POST['sposob'];}
	$to = "Porofix@yandex.ru";
	$headers = "Content-type: text/plain; charset =utf-8";
	$subject = "japan-filter.ru [ЗАКАЗ]";
	$message = "ЗАКАЗ реквизиты:
				Заказчик - $name
				Адрес заказчика - $adress
				Телефон заказчика - $phone
				E-mail заказчика - $email
				Город доставки - $city
				-------------------------------------------------------
				Заказ состоит из:
				Nose Mask – L - $nml штук
				Pit Stopper – L - $psl штук
				Nose Mask – S - $nms штук
				Pit Stopper – S - $pss штук
				на сумму $summa
				Выбранный способ оплаты - $sposob";
	$send = mail($to, $subject, $message, $headers);
	if ($send == 'true'){
		echo ("Спасибо! В ближайшее время с Вами<br>свяжется наш специалист.<br>Мы работаем с 9 до 21 по Мск.");
	} else {
		echo ("Сообщение не отправлено!");
	}
?>