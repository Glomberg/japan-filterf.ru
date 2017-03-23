<?php
/*
Plugin Name: Bazz CallBack Widget
Plugin URI: http://viktor-web.ru
Description: This plugin makes a simple widget for callback on your website.
Author: Viktor Ievlev
Version: 1.4
Author URI: http://viktor-web.ru
*/
/*
    Copyright 2016  Viktor Ievlev  (email: bazz@bk.ru)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
//activation hook
register_activation_hook( __FILE__, 'bazz_install');
function bazz_install() {
	$bazz_options_arr = array(
		'email' => 'example@mail.com',
		'work_time_start' => '9',
		'work_time_end' => '21',
		'time' => '48',
		'button_text' => 'ПОЗВО-НИТЬ',
		'send_text' => 'Жду звонка!',
		'day_text' => 'Нагрузка крайне высокая, мы перезвоним Вам в ближайшее время. Спасибо!',
		'night_text' => 'К сожалению, сейчас мы не работаем! Мы перезвоним Вам завтра! Спасибо!',
		'bottom' => '68'
	);
	update_option('bazz_options', $bazz_options_arr);
}
//deactivation hook
register_deactivation_hook( __FILE__, 'bazz_deactivate');
function bazz_deactivate() {
	
}
//load styles and scripts
add_action('init', 'bazz_widget_styles');
function bazz_widget_styles() {
	if(!is_admin()) {
		wp_enqueue_style('bazz_widget_style', plugins_url('css/bazz-widget.css', __FILE__));
	} else {
		wp_enqueue_style('bazz_widget_style', plugins_url('css/bazz-widget-admin.css', __FILE__));
	}
}

add_action('wp_enqueue_scripts', 'bazz_widget_scripts');
function bazz_widget_scripts() {
	wp_enqueue_script('jquery');
    wp_enqueue_script('bazz_maskedinput', plugins_url('js/jquery.maskedinput.min.js', __FILE__), 'jquery', null, true);
	wp_enqueue_script('bazz_draggable', plugins_url('js/jquery.draggable.min.js', __FILE__), 'jquery', null, true);
    wp_enqueue_script('bazz_widget_script', plugins_url('js/bazz-widget.js', __FILE__), 'jquery', null, true);
}

add_action('admin_enqueue_scripts', 'bazz_widget_admin_scripts');
function bazz_widget_admin_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('bazz_slider', plugins_url('js/jquery.ui-slider.js', __FILE__), 'jquery');
	wp_enqueue_script('bazz_widget_script', plugins_url('js/bazz-widget-admin.js', __FILE__), 'bazz_slider');
}

add_action('wp_enqueue_scripts', 'myajax_data', 99);
function myajax_data(){
	wp_localize_script('bazz_widget_script', 'myajax', 
		array(
			'url' => admin_url('admin-ajax.php')
		)
	);
}

//AJAX
add_action('wp_ajax_bazz_widget_action', 'bazz_widget_send');
add_action('wp_ajax_nopriv_bazz_widget_action', 'bazz_widget_send');
function bazz_widget_send() {
	if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
	if (isset($_POST['name'])) {$name = $_POST['name'];} else {$name = 'Клиент не представился';}
	$blog_url = get_home_url();
	$bazz_options_arr = get_option('bazz_options');
	$email = $bazz_options_arr['email'];
	$current_time = current_time('G');
	$work_time_start = $bazz_options_arr['work_time_start'];
	$work_time_end = $bazz_options_arr['work_time_end'];
	$text = $bazz_options_arr['day_text'];
	if ($work_time_start > $current_time || $current_time >= $work_time_end) {
		$text = $bazz_options_arr['night_text'];
	}
	$to = $email;
	$headers = "Content-type: text/plain; charset =utf-8";
	$subject = "$blog_url [ИЗ ВИДЖЕТА]";
	$message = "Телефон - $phone
				Имя - $name";
	$send = mail($to, $subject, $message, $headers);
	if ($send == 'true'){
		echo ('<div style="color: #FFFFFF; font-size: 18px; line-height: 1.2; padding-top: 13px;">'.$text.'</div>');
		wp_die();
	} else {
		return false;
		wp_die();
	}
}

//HTML layout
add_action('wp_footer', 'bazz_layout');
function bazz_layout() { ?>
	<?php $bazz_options_arr = get_option('bazz_options'); ?>
	<style>
		.bazz-widget {bottom: <?php echo($bazz_options_arr['bottom']); ?>px;}
	</style>
	<div class="bazz-widget">
		<div class="bazz-widget-button">
			<i></i>
			<i><?php echo($bazz_options_arr['button_text']); ?></i>
		</div>
		<div class="bazz-widget-close">+</div>
		<div class="bazz-widget-form">
			<div class="bazz-widget-form-top">
				<label>Перезвоним <a href="#" class="bazz-widget-your-name">Вам</a> за<br>00:<span class="bazz_time"><?php echo($bazz_options_arr['time']); ?></span> секунд!</label>
				<input type="text" value="<?php echo plugins_url('', __FILE__); ?>" id="plugin-url" hidden />
				<input id="bazz-widget-phone" name="bazz-widget-phone" value="" type="tel" placeholder="+7(___)___-__-__" />
				<a href="#" class="bazz-widget-form-submit"><?php echo($bazz_options_arr['send_text']); ?></a>
			</div>
			<div class="bazz-widget-form-bottom">
				<label>Представьтесь, и мы будем обращаться по имени</label>
				<input id="bazz-widget-name" name="bazz-widget-name" value="" type="text" placeholder="Введите Ваше имя" />
				<a href="#" class="bazz-widget-name-close"></a>
			</div>
		</div>
		<div class="bazz-widget-inner-circle"></div>
		<div class="bazz-widget-inner-border"></div>
	</div>
<?php } 
//menu
add_action('admin_menu','bazz_widget_menu');
function bazz_widget_menu() {
	add_options_page('Bazz CallBack Widget settins page', 'Bazz CallBack Widget settings', 'manage_options', 'bazz_menu', 'bazz_menu_page');
	add_action('admin_init', 'bazz_register_settings');
}
function bazz_register_settings() {
	register_setting('bazz_settings_group', 'bazz_options', 'bazz_sanitize_options');
}
function bazz_sanitize_options($input) {
	$input['email'] = sanitize_email($input['email']);
	$input['work_time_start'] = sanitize_text_field($input['work_time_start']);
	$input['work_time_end'] = sanitize_text_field($input['work_time_end']);
	$input['time'] = sanitize_text_field($input['time']);
	$input['button_text'] = sanitize_text_field($input['button_text']);
	$input['send_text'] = sanitize_text_field($input['send_text']);
	$input['day_text'] = sanitize_text_field($input['day_text']);
	$input['night_text'] = sanitize_text_field($input['night_text']);
	$input['bottom'] = sanitize_text_field($input['bottom']);
	return $input;
}
function bazz_menu_page() { ?>
	<h2>Привет! Это настройки плагина Bazz CallBack Widget</h2>
	<p>Изменяем параметры на свое усмотрение.<br></p>
	<form method="post" action="options.php" id="bazz-settings-form">
		<?php settings_fields('bazz_settings_group'); ?>
		<?php $bazz_options = get_option('bazz_options'); ?>
		<div class="option-email">
			<label for="">Отправлять письмо на:<input type="email" name="bazz_options[email]" value="<?php echo esc_attr($bazz_options['email']); ?>" /></label>
		</div>
		
		<div class="option-work-time">
			<input type="text" id="work-time-start" name="bazz_options[work_time_start]" value="<?php echo esc_attr($bazz_options['work_time_start']); ?>" />
			<input type="text" id="work-time-end" name="bazz_options[work_time_end]" value="<?php echo esc_attr($bazz_options['work_time_end']); ?>" />
			<label>Укажите время работы:</label>
			<div></div>
			
			<script>
			jQuery(document).ready(function(){
				min_value = parseInt(jQuery("#work-time-start").val());
				max_value = parseInt(jQuery("#work-time-end").val());
				jQuery(".option-work-time > div").slider({
					min: 0,
					max: 24,
					values: [min_value, max_value],
					range: true,
					slide: function( event, ui ) {
						jQuery(".option-work-time label > strong:eq(0)").text(ui.values[ 0 ]);
						jQuery(".option-work-time label > strong:eq(1)").text(ui.values[ 1 ]);
						jQuery("#work-time-start").val(ui.values[ 0 ]);
						jQuery("#work-time-end").val(ui.values[ 1 ]);
					}
				});
			});
			</script>
			
			<label>Рабочий день с <strong><?php echo esc_attr($bazz_options['work_time_start']); ?></strong> ч. до <strong><?php echo esc_attr($bazz_options['work_time_end']); ?></strong> ч.</label><br>
			<em>*Часовой пояс берется из настроек WordPress</em>
		</div>
		<div class="option-timer">
			<label for="">Таймер обратного отсчета будет запущен на <input type="text" name="bazz_options[time]" value="<?php echo esc_attr($bazz_options['time']); ?>" /> секунд.</label>
		</div>
		<div class="option-text1">
			<label for="">Текст на круглой синей кнопке:</label>
			<input type="text" name="bazz_options[button_text]" value="<?php echo esc_attr($bazz_options['button_text']); ?>" />
		</div>
		<div class="option-text2">
			<label for="">Текст на кнопке отправки формы:</label>
			<input type="text" name="bazz_options[send_text]" value="<?php echo esc_attr($bazz_options['send_text']); ?>" />
		</div>
		<div class="option-text3">
			<label for="">Текст-результат в рабочее время (днем):</label>
			<textarea name="bazz_options[day_text]"><?php echo($bazz_options['day_text']); ?></textarea>
		</div>
		<div class="option-text4">
			<label for="">Текст-результат в НЕ рабочее время (ночью):</label>
			<textarea name="bazz_options[night_text]"><?php echo($bazz_options['night_text']); ?></textarea>
		</div>
		<div class="option-bottom">
			<label for="">Расстояние от низа окна
			<input type="text" name="bazz_options[bottom]" value="<?php echo esc_attr($bazz_options['bottom']); ?>" /> px.</label>
		</div>
		<div>
			<input type="submit" value="Сохранить" />
		</div>
	</form>
<?php }

?>