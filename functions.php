<?php


//const
if (!defined('ENTERWELL_DIR_PATH')) {
    define('ENTERWELL_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('ENTERWELL_DIR_URI')) {
    define('ENTERWELL_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once ENTERWELL_DIR_PATH . '/inc/helper/autoloader.php';

function enterwell_get_theme_instance()
{
    ENTERWELL_THEME\Inc\Enterwell_Theme::get_instance();
}
enterwell_get_theme_instance();
