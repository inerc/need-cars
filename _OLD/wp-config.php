<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'fanclo_needcar');

/** Имя пользователя MySQL */
define('DB_USER', 'fanclo_needcar');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'a{u?43Bo');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'HZK$`[hO&q2E^[Mygk>*P|/lc9}x9)0@VOQ>5mMDK}5ji[*H$-6TFEal^e3#zeb_');
define('SECURE_AUTH_KEY',  '|TZuMKL&T :uH0T5V<#LktH&X^~$l7wgLJYYjvU#q+PM^-x @~#,~YZ[5(z<L$;t');
define('LOGGED_IN_KEY',    '3gu(vuT2w#}|BVe6x,g2Rs6}&K>(E/aJ*Fk0p} tDHOx&A^7Fs(M7f~bz`hzdcd9');
define('NONCE_KEY',        'U_SE<Pa.[{uhbx(eeV3Wb+s8AI:1KigAoTO&_a@Wzc7/Dh>:NzqiVQQH%>Hc5&nx');
define('AUTH_SALT',        '$aa#]fth#7>HXY>>UA>xXfhe/irU`-@i[Q/ZW;@jj;Qv.>z<+qR&~mfIVE[|?Mut');
define('SECURE_AUTH_SALT', 'ew(T136)u5` f(u<GMR$^}-JJJ1>..9zc^s}%UVar8!rPOjCL7XF`r8;[y>&oLZm');
define('LOGGED_IN_SALT',   '[VzvBsL+r,lelA7o=f!(6.S*!MeCF-z8|{`mx;>@_9;:cV^kM,K@0rZ(#0v1B}(&');
define('NONCE_SALT',       '9w=~+EMuYg1ZfMQ0$rJZBX*Wc.kj6N[eMR/TCNSUAno*=W0M%2KJ6Nw3xc-,z<-^');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_bmw_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
