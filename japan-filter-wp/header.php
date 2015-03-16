<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title><?php if (is_front_page () ) echo 'Японские фильтры для носа.'; else wp_title('', true, 'right'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri()?>/css/css-reset.css" />
	<link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri()?>/css/styles.css" />
	<link rel="shortcut icon" href="<?=get_template_directory_uri()?>/favicon.ico" type="image/x-icon" />
	<link href='http://fonts.googleapis.com/css?family=Philosopher&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<script src="<?=get_template_directory_uri()?>/js/jquery-1.11.2.min.js"></script>
	<script src="<?=get_template_directory_uri()?>/js/script.js"></script>
	<?php wp_head(); ?>
</head>
<body>
<div id="main">
<!--LEFT-SIDE - лого+форма обратного звонка+две ссылки-->
	<div class="left-side">
		<div class="line-top"></div>
		<div class="logo"><a href="/"></a></div>
		<div class="phone"><a href="tel:+74953747186">8 (495) 374-71-86 (Мск)</a></div>
		<div class="sacura"></div>
		<div class="obratniy-zvonok">
			<form action="" method="POST">
				<div class="zvonok-zagolovok">ОБРАТНАЯ СВЯЗЬ</div>
				<label for="zvonok-name">Ваше имя:</label>
					<input type="text" name="zvonok-name" id="zvonok-name" />
				<label for="zvonok-phone">Ваш телефон:</label>
					<input type="text" name="zvonok-phone" id="zvonok-phone" required />
				<label for="zvonok-message">Ваше сообщение:</label>
					<textarea name="zvonok-message" id="zvonok-message"></textarea>
				<!--<input type="submit" value="ОТПРАВИТЬ" hidden /> Запомни! Баттоны и Сабмиты это не кроссбраузерно-->
				<a href="#" id="zvonok-submit">ОТПРАВИТЬ</a>
			</form>
		</div>
		<div class="left-links">
			<a href="#">Где купить Японские<br>фильтры для носа?</a>
			<a href="#">Оптовикам</a>
		</div>
	</div>
<!--RIGHT-SIDE - меню+слайдер+контент-->
	<div class="right-side">
		<span class="slide-ugolok"></span>
		<nav>
			<ul>
				<li id="menu-1"><a href="/">Статьи</a></li>
				<li id="menu-2"><a href="http://japan-filter.ru/japonskie-filtri-dla-nosa/">Японские фильтры<br>для носа</a></li>
				<li id="menu-3"><a href="http://japan-filter.ru/japonskie-filtri-dla-nosa-issledovaniya/">Исследования</a></li>
				<li id="menu-4"><a href="http://japan-filter.ru/japonskie-filtri-dla-nosa-voprosi/">Вопросы</a></li>
				<li id="menu-5"><a href="http://japan-filter.ru/japonskie-filtri-dla-nosa-otzivi/">Отзывы</a></li>
				<li id="menu-6"><a href="http://japan-filter.ru/japonskie-filtri-dla-nosa-kupit/">Оформить<br> заказ</a></li>
			</ul>
		</nav>
		<div class="slide"></div>
		<!--КОНТЕНТ НАЧАЛО-->