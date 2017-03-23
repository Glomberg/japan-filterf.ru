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
			<!-- ТОВАР 1 -->
			<tr>
				<td>
					<input type="checkbox" id="normal-without" />
					<label for="normal-without">Стандартный размер. Без насморка. <em>(Nose Mask – L)</em></label>
				</td>
				<td class="td-value">
					<div class="minus">-</div>
					<input type="text" id="normal-without-text" disabled />
					<div class="plus">+</div>
					<div class="fake-input"></div>
				</td>
				<td>790 руб.</td>
				<td rowspan="4" style="text-align:center;" class="zakaz-summa"></td>
			</tr>
			<!-- ТОВАР 2 -->
			<tr>
				<td>
					<input type="checkbox" id="normal-with" />
					<label for="normal-with">Стандартный размер. При насморке. <em>(Pit Stopper – L)</em></label>
				</td>
				<td class="td-value">
					<div class="minus">-</div>
					<input type="text" id="normal-with-text" disabled />
					<div class="plus">+</div>
					<div class="fake-input"></div>
				</td>
				<td>790 руб.</td>
			</tr>
			<!-- ТОВАР 3 -->
			<tr>
				<td>
					<input type="checkbox" id="little-without" />
					<label for="little-without">Маленький размер. Без насморка. <em>(Nose Mask – S)</em></label>
				</td>
				<td class="td-value">
					<div class="minus">-</div>
					<input type="text" id="little-without-text" disabled />
					<div class="plus">+</div>
					<div class="fake-input"></div>
				</td>
				<td>790 руб.</td>
			</tr>
			<!-- ТОВАР 4 -->
			<tr>
				<td>
					<input type="checkbox" id="little-with" />
					<label for="little-with">Маленький размер. При насморке. <em>(Pit Stopper – S)</em></label>
				</td>
				<td class="td-value">
					<div class="minus">-</div>
					<input type="text" id="little-with-text" disabled />
					<div class="plus">+</div>
					<div class="fake-input"></div>
				</td>
				<td>790 руб.</td>
			</tr>
		</table>
		<div class="article-line-free"></div>
		<div class="info">
			
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
				<li>Для заказа в Казахстан и другие страны указывайте контактный e-mail</li>
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
		<div class="zakaz-form-submit-area">
			<a href="javascript:void(0)" id="zakaz">Оформить</a>
		</div>
		<div class="zakaz-form-submit-result"></div>
	</form>
</article>
<?php get_footer(); ?>