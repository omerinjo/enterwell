<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <!-- <?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?> -->
    <?php wp_head(); ?>
</head>

<body>

    <!-- <nav>
        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu([
                'theme_location'    => 'primary',
                'container'         => false,
                'fallback_cb'       => false,
                'depth'             => 2
                // 'menu_class'        => 'en_navigaiotn'
            ]);
        }
        ?>
    </nav> -->