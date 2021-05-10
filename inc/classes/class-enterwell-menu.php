<?php

namespace ENTERWELL_THEME\Inc;

use WP_REST_Server;
use WP_REST_Controller;
use ENTERWELL_THEME\Inc\Traits\Singleton;

class Enterwell_Menu extends WP_REST_Controller
{

    use Singleton;
    public $db;
    protected function __construct()
    {
        $this->db = Enterwell_DB::get_instance();
        $this->setup_menu();
    }
    function setup_menu()
    {
        add_action('admin_menu', [$this, 'add_menu_items']);
        add_action('admin_enqueue_scripts', [$this, 'register_style']);
        add_action('admin_enqueue_scripts', [$this, 'register_script']);
        // add_action('rest_api_init', [$this, ' show_enterell_game_stat']);
    }
    function add_menu_items()
    {
        add_menu_page(
            'enterwell',
            'Enterwell igra',
            'edit_pages',
            'enterwell-igra',
            [$this, 'show_enterell_game_stat']
        );
    }

    function register_style()
    {
        if (!isset($_GET['page']) || $_GET['page'] != "enterwell-igra") {
            return;
        }
        wp_register_style('enterwell_bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
        wp_enqueue_style('enterwell_bootstrap');
    }

    function register_script()
    {
        wp_register_script('en_admin', ENTERWELL_DIR_URI . '/js/dist/bundle.js', [], false, true);
        wp_enqueue_script('en_admin');
    }
    function show_enterell_game_stat()
    {
?>
        <div class="wraper">
            <div id="admin-root"></div>
        </div>
<?php

    }
}
