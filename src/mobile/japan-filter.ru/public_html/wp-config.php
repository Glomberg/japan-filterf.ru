<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'gazangago_1');

/** Имя пользователя MySQL */
define('DB_USER', 'gazangago_1');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '19ffpNWn');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '#iK,c it?]SY`@Hy>_P{A)z`B(iJ0`n@co,EaI9oaE@6[Sd|<]N4#o<7/GCy[5~F');
define('SECURE_AUTH_KEY',  'R$xk00-~5]@Q>7c,+6kN-YIIRbVe-;7,1Nb+9``QI5mH>l9,C|wmoL}y82Wz8.mI');
define('LOGGED_IN_KEY',    'YT6h+E,qx|$]=Rg2[GOlzrK>U1aTA@b{A}v<yD^P-J96hdwE`n2,3b00x_W1:*d]');
define('NONCE_KEY',        '2&}F9zkv-qzu] ^iAI]3z-4M]KL=k}byQ00mb! nK{*J<H%p#BUIADiFz9n1.&6u');
define('AUTH_SALT',        'n5`~>cYJy<Xa_sq:Ez:MP,&-s8^Tmd8xISC3Z(`|;1omv9N@&:+<^YXbdEzKfr!K');
define('SECURE_AUTH_SALT', '.glb!]VE)hfl&GAf=U|{rAmrkTO~5-a/|G>@|gELi 2L_9`B}%Fd,2V$SLt}`Cy@');
define('LOGGED_IN_SALT',   '065] $n4b.X2w0[f4B_:lYv>}l>@%v|rP5>(l-sLW}=r0JO<O<CfET},:#$>$f5O');
define('NONCE_SALT',       'FTb~t.0_+Ew<barEz[$t4rqd4=#*}=)Bi5[L$*tzg9^=HGRZj4z.lIS@lc+j#8$F');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);
//ini_set('display_errors', 1);
/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
