<?php 
/*
*Template Name: Для "ЗАКАЗ"
*/
get_header(); ?>
<?php iinclude_page(54); ?>
<article>
	<section>
		<h2>ОФОРМЛЕНИЕ ЗАКАЗА</h2>
		<div class="article-line"></div>
	</section>
	<form method="" action="" id="zakaz-form">
		<table width="100%">
			<tr>
				<th width="55%">Выберите тип <a href="http://japan-filter.ru/japonskie-filtri-dla-nosa/">японских фильтров для носа</a>:</th>
				<th width="15%">Кол-во:</th>
				<th width="10%">Цена за уп:</th>
				<th width="20%" style="text-align:center;">Общая сумма *:</th>
			</tr>
			<tr>
				<td>
					<input type="checkbox" id="normal-without" />
					<label for="normal-without">Стандартный размер. Без насморка. <em>(Nose Mask – L)</em></label>
				</td>
				<td>
					<input type="text" id="normal-without-text" disabled />
				</td>
				<td>650 руб.</td>
				<td rowspan="4" style="text-align:center;" class="zakaz-summa"></td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" id="normal-with" />
					<label for="normal-with">Стандартный размер. При насморке. <em>(Pit Stopper – L)</em></label>
				</td>
				<td>
					<input type="text" id="normal-with-text" disabled />
				</td>
				<td>650 руб.</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" id="little-without" />
					<label for="little-without">Маленький размер. Без насморка. <em>(Nose Mask – S)</em></label>
				</td>
				<td>
					<input type="text" id="little-without-text" disabled />
				</td>
				<td>650 руб.</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" id="little-with" />
					<label for="little-with">Маленький размер. При насморке. <em>(Pit Stopper – S)</em></label>
				</td>
				<td>
					<input type="text" id="little-with-text" disabled />
				</td>
				<td>650 руб.</td>
			</tr>
		</table>
		<div class="article-line-free"></div>
		<div class="info">
			<div>При заказе 2-ух упаковок - бесплатная доставка по Мск и СПб</div>
			<div>При заказе 3-ёх упаковок - бесплатная доставка по России</div>
		</div>
		<div class="input fio">
			<span><label for="fio">ФИО:</label></span>
			<span><input type="text" id="fio" /></span>
		</div>
		<div class="input adress">
			<span><label for="adress">Адрес:</label></span>
			<span><input type="text" id="adress" /></span>
		</div>
		<div class="input telefon">
			<span><label for="telefon">Телефон:</label></span>
			<span><input type="text" id="telefon" /></span>
		</div>
		<div class="input email">
			<span><label for="email">E-mail:</label></span>
			<span><input type="text" id="email" /></span>
		</div>
		<div class="input city">
			<span><label for="city">Город:</label></span>
			<span><input type="text" id="city" /></span>
		</div>
		<div class="dostavka">
			<ul id="varianty">
				<li>Мы осуществляем доставку во все города России</li>
				<li>Стоимость курьерской доставки от 250р.</li>
				<li>Самостоятельный забор из <a href="http://japan-filter.ru/japonskie-filtri-dla-nosa-punkti-vidachi/" target="_blank">пунктов выдачи заказов</a> от 100р.</li>
				<li>Время доставки от 1 дня</li>
				<li>* Точную стоимость и время доставки Вам назовет оператор</li>
			</ul>
			<!--<span> ЭТО БЫЛО УЧТЕНО В МАКЕТЕ - СВЕРСТАЛ, МАЛО-ЛИ ПРИГОДИТСЯ ЕЩЕ
				<input name="dostavka" type="radio" id="dostavka-kurier" />
				<label for="dostavka-kurier">Курьер</label>
			</span>
			<span>
				<input name="dostavka" type="radio" id="dostavka-sam" />
				<label for="dostavka-sam">Сам</label>
			</span>-->
		</div>
		<div class="oplata">
			<h3>Способ оплаты:</h3><br>
			<span>
				<input name="oplata" type="radio" id="oplata-nal" value="oplata-nal" />
				<label for="oplata-nal">Наличными при получении</label>
			</span>
			<span>
				<input name="oplata" type="radio" id="oplata-karta" value="oplata-karta" />
				<label for="oplata-karta">Безналичной оплатой</label>
			</span>
		</div>
		<input type="reset" hidden />
		<a href="javascript:void(0)" id="zakaz-form-submit">Оформить</a>
		<div class="zakaz-form-submit-result"></div>
	</form>
</article>
<?php get_footer(); ?>