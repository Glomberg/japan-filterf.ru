<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/roistatSend.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/MoiSkladApi.php';

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
    $comment = 'Адрес: '.$adress."\r\n".'Город: '.$city."\r\n".'Телефон: '.$phone."\r\n".'Email: '.$email."\r\n".'Способ оплаты: '.$sposob."\r\n".'Итоговая сумма: '.$summa."\r\n";
    $tovaru = array(0=>'Nose Mask – L',1=>'Pit Stopper – L',2=>'Nose Mask – S',3=>'Pit Stopper – S');
    $tovaru_val = array(0=>$nml,1=>$psl,2=>$nms,3=>$pss);
    $city_arr = "";
    $rs = new roistatSend('Форма "Оформить заказ"', $comment, $name, $email, $phone, $city);

    foreach ($tovaru as $key=>$tv) {
        if($tovaru_val[$key]>=1) {
            $arr = $rs->getProductId($tv);
            $product[] = array(
                'uuid'     => $arr['id'],
                'count'    => $tovaru_val[$key],
                'discount' => '0',
                'vat'      => '0',
                'sum'      => $arr['sum'],
            );
        }
    }
    if(empty($product)) {
        $product[] = array(
            'uuid'     =>'fb7069ec-5ae1-11e6-7a69-8f5500045d75',
            'count'    => '1',
            'discount' => '0',
            'vat'      => '0',
            'sum'      => '0',
        );
    }
    if($city!="") {
        $city_arr = MoiSkladApi::MoySkladCity(MoiSkladApi::MoySkladNormalizeCityName($city));
    }
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
        $rs->send($product, $city_arr);
	} else {
		echo ("Сообщение не отправлено!");
	}
?>