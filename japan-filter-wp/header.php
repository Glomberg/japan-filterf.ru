<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title><?php wp_title('', true, 'right'); ?></title>
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
		<div class="logo"><a href="#"></a></div>
		<div class="sacura"></div>
		<div class="obratniy-zvonok">
			<form action="" method="POST">
				<div class="zvonok-zagolovok">ОБРАТНАЯ СВЯЗЬ</div>
				<label for="zvonok-name">Ваше имя:</label>
					<input type="text" name="zvonok-name" id="zvonok-name" />
				<label for="zvonok-phone">Ваш телефон:</label>
					<input type="text" name="zvonok-phone" id="zvonok-phone" required />
				<label for="zvonok-message">Ваше сообщение:</label>
					<input type="text" name="zvonok-message" id="zvonok-message" />
				<!--<input type="submit" value="ОТПРАВИТЬ" hidden /> Запомни! Баттоны и Сабмиты это не кроссбраузерно-->
				<a href="#" id="zvonok-submit">ОТПРАВИТЬ</a>
			</form>
		</div>
		<div class="left-links">
			<a href="#">Где купить<br>Японские фильтры?</a>
			<a href="#">Оптовикам</a>
		</div>
	</div>
<!--RIGHT-SIDE - меню+слайдер+контент-->
	<div class="right-side">
		<span class="slide-ugolok"></span>
		<nav>
			<ul>
				<li><a href="#">Вдыхаемый<br> воздух</a></li>
				<li><a href="#">Японские<br> фильтры</a></li>
				<li><a href="#">Исследования</a></li>
				<li><a href="#">Вопросы</a></li>
				<li><a href="#">Отзывы</a></li>
				<li><a href="#">Оформить<br> заказ</a></li>
			</ul>
		</nav>
		<div class="slide"></div>
		<!--КОНТЕНТ НАЧАЛО-->