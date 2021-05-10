<?php

namespace ENTERWELL_THEME\Inc;


use ENTERWELL_THEME\Inc\Traits\Singleton;

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
class Enterwell_DB
{
    use Singleton;

    protected function __construct()
    {

        $this->create_database();
        $this->create_enterwell_post_type();
        $this->setup_post_type();
    }

    protected function create_database()
    {

        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $sql_query  = "
    CREATE TABLE `" . $wpdb->prefix . "enterwell_game`(
       ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
       name VARCHAR(40),
       last_name VARCHAR(40),  
       street VARCHAR(100),   
       street_number VARCHAR(100),
       city VARCHAR(100),
       post_number VARCHAR(100),
       state VARCHAR(100),
       phone_number VARCHAR(100),
       email VARCHAR(100),
       number VARCHAR(100),
       PRIMARY KEY  ( id )
    ) ENGINE=InnoDB " . $charset_collate . ";";
        // maybe_create_table($wpdb->prefix . "enterwell_game", $sql_query);
        dbDelta($sql_query);
    }

    // Dohvaca sve podatke sa nagradne igre
    public function get_data_by_descending($limit = 10, $offset = 1)
    {
        global $wpdb;
        $results = $wpdb->get_results("SELECT * ,CAST( (SELECT count(*) FROM `wp_enterwell_game` )as INT ) as total_rows FROM {$wpdb->prefix}enterwell_game ORDER by id desc  LIMIT $limit OFFSET $offset");
        return $results;
    }

    // funckija koja spasava nagradnu igru u DB
    public function save_game_in_database($data)
    {
        global $wpdb;
        $sql = "SELECT * FROM {$wpdb->prefix}enterwell_game WHERE number = '$data->number' or email = '$data->email'";
        $result = $wpdb->get_results($sql);
        if (!empty($result)) {
            return 0;
        } else {
            $array = (array)$data;
            $result = $wpdb->insert("wp_enterwell_game", $array);
            return 1;
        }
    }
    public function setup_post_type()
    {
        add_action('init', [$this, 'create_enterwell_post_type']);
    }
    public function create_enterwell_post_type()
    {
        $labels = array(
            'name'                  => _x('Games', 'Post type general name', 'enterwell'),
            'singular_name'         => _x('Game', 'Post type singular name', 'enterwell'),
            'menu_name'             => _x('Enterwell game', 'Admin Menu text', 'enterwell'),
            'name_admin_bar'        => _x('Game', 'Add New on Toolbar', 'enterwell'),
            'add_new'               => __('Add New', 'enterwell'),
            'add_new_item'          => __('Add New Game', 'enterwell'),
            'new_item'              => __('New Game', 'enterwell'),
            'edit_item'             => __('Edit Game', 'enterwell'),
            'view_item'             => __('View Game', 'enterwell'),
            'all_items'             => __('All Games', 'enterwell'),
            'search_items'          => __('Search Games', 'enterwell'),
            'parent_item_colon'     => __('Parent Games:', 'enterwell'),
            'not_found'             => __('No Games found.', 'enterwell'),
            'not_found_in_trash'    => __('No Games found in Trash.', 'enterwell'),
            'featured_image'        => _x('Game Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'enterwell'),
            'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'enterwell'),
            'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'enterwell'),
            'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'enterwell'),
            'archives'              => _x('Game archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'enterwell'),
            'insert_into_item'      => _x('Insert into Game', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'enterwell'),
            'uploaded_to_this_item' => _x('Uploaded to this Game', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'enterwell'),
            'filter_items_list'     => _x('Filter Games list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'enterwell'),
            'items_list_navigation' => _x('Games list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'enterwell'),
            'items_list'            => _x('Games list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'enterwell'),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => ['slug' => 'Game'],
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'],
            'taxonomies'         => ['category', 'post_tag'],
            'show_in_rest'       => true
        );

        register_post_type('enterwell_game', $args);
    }
}
