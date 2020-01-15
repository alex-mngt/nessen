<?php

add_theme_support('post-thumbnails');

add_action('wp_enqueue_scripts', 'conditional_style_enqueuing');
function conditional_style_enqueuing()
{
    // import the fonts on all pages

    wp_register_style('fonts', 'https://use.typekit.net/nzg4ttb.css');
    wp_enqueue_style('fonts');

    if (is_page('programme')) {
        wp_register_script('programme-script', get_template_directory_uri() . '/sources/scripts/programme.js');
        wp_enqueue_script('programme-script');
    }
}

add_action('after_setup_theme', 'configure_menus');
function configure_menus()
{
    register_nav_menu('header-menu', 'Menu Header');
}

add_action('init', 'register_report');
function register_report()
{
    $labels = [
        'name' => 'Compte-rendus',
        'singular_name' => 'Compte-rendu',
        'search_items' => 'Rechercher des compte-rendus',
        'all_items' => 'Tous les compte-rendus',
        'parent_item' => 'Compte-rendu parent',
        'parent_item_colon' => 'Compte-rendu parent :',
        'edit_item' => 'Modifier le compte-rendu',
        'update_item' => 'Mettre à jour le compte-rendu',
        'add_new_item' => 'Nouveau compte-rendu',
        'new_item_name' => 'Nouveau nom de compte-rendu',
        'not_found' => 'Aucun compte-rendu trouvé',
        'not_found_in_trash' => 'Aucun compte-rendu trouvé dans la corbeille',
        'menu_name' => 'Compte-rendus',
    ];

    $svg = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBkPSJNMyAxOGgxMnYtMkgzdjJ6TTMgNnYyaDE4VjZIM3ptMCA3aDE4di0ySDN2MnoiLz48cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwaDI0djI0SDBWMHoiLz48L3N2Zz4=';

    $args = [
        'labels' => $labels,
        'public' => true,
        'menu_position' => 4,
        'rewrite' => ['slug' => 'compte-rendus'],
        'menu_icon' => $svg,
        'supports' => ['comments', 'title', 'revisions', 'author', 'excerpt', 'thumbnail', 'editor'],
    ];

    register_post_type('report', $args);
}

function register_event()
{
    $labels = [
        'name' => 'Événements',
        'singular_name' => 'Événement',
        'search_items' => 'Rechercher des événements',
        'all_items' => 'Tous les événements',
        'parent_item' => 'Événement parent',
        'parent_item_colon' => 'Evénement parent :',
        'edit_item' => 'Modifier l\'événement',
        'update_item' => 'Mettre à jour l\'événement',
        'add_new_item' => 'Nouvel événement',
        'new_item_name' => 'Nouveau nom d\'événement',
        'not_found' => 'Aucun événement trouvé',
        'not_found_in_trash' => 'Aucun événement trouvé dans la corbeille',
        'menu_name' => 'Événements',
    ];
    $args = [
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
    ];
    register_taxonomy('event', ['report'], $args);
}
add_action('init', 'register_event');
