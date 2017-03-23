<?php 
/*
*Template Name: Для "ОНЛАЙН ОПЛАТА"
*/
get_header(); ?>
	<form class="kassa" name=ShopForm method="POST" action="https://money.yandex.ru/eshop.xml">
	<h2>Онлайн оплата Вашего заказа:</h2><br>
		<input type="hidden" name="scid" value="35277">
		<input type="hidden" name="ShopID" value="101863">
		<label for="zakaz-n">Номер заказа * 
			<a href="http://japan-filter.ru/?page_id=54"> (Оформить заказ)</a></label>
			<input id="zakaz-n" type=text name="CustomerNumber" size="43" required>
		<br>
		<label for="zakaz-s">Стоимость заказа *</label>
			<input id="zakaz-s" type=text name="Sum" size="43" required>
		<br>
		<label>Способ оплаты:</label><br>
		<input id="PC" name="paymentType" value="PC" type="radio" checked="checked"/>
			<label for="PC">Со счета в Яндекс.Деньгах</label>
		<input id="AC"  name="paymentType" value="AC" type="radio" />
			<label for="AC">С банковской карты</label>
		<input id="WM" name="paymentType" value="WM" type="radio" />
			<label for="WM">Со счета WebMoney</label>
		<input id="GP" name="paymentType" value="GP" type="radio" />
			<label for="GP">По коду через терминал</label><br>
		<input type=submit value="ОПЛАТИТЬ"><br>
		<label style="width: 100%;">* Поля, помеченные звездочкой, обязательны для заполнения.</label>
	</form>
	<?php iinclude_page(404); ?>
<?php get_footer(); ?>