<?php

namespace ENTERWELL_THEME\Inc;


use ENTERWELL_THEME\Inc\Traits\Singleton;

class Enterwell_Theme
{
    use Singleton;

    protected function __construct()
    {
        Enterwell_DB::get_instance();
        Enterwell_Cont::get_instance();
        Enterwell_Menu::get_instance();
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         * 
         *Actions
         *
         */
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }

    public function register_styles()
    {
        //Register style
        wp_register_style('en_style',  ENTERWELL_DIR_URI . '/style.css');
        wp_register_style('en_google_fonts', 'https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap', []);
        wp_register_style('en_bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
        //Enqueue style
        wp_enqueue_style('en_google_fonts');
        wp_enqueue_style('en_bootstrap');
        wp_enqueue_style('en_style');
    }

    public function register_scripts()
    {
        //REgister scripts
        wp_register_script('en_jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array('jquery'), false, true);
        wp_register_script('en_popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), '', true);
        wp_register_script('en_bootstrsap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array('jquery'), '', true);
        wp_register_script('en_index', ENTERWELL_DIR_URI . '/js/index.js', [], false, true);
        // wp_register_script('en_sweet_alert', "https://unpkg.com/sweetalert/dist/sweetalert.min.js", [], false, true);
        // Enqueue scipts
        wp_enqueue_script('en_jquery');
        wp_enqueue_script('en_popper');
        wp_enqueue_script('en_bootstrsap');
        wp_enqueue_script('en_index');
        // wp_enqueue_script('en_sweet_alert');
    }

    public function setup_theme()
    {
        register_nav_menu(
            'primary',
            __('Primary Menu', 'enterwell')
        );
        add_theme_support('title-tag');

        add_theme_support('html5', [
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption',
            'style',
            'script'
        ]);
        add_theme_support('align-wide');
    }
}
