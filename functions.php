<?php
add_action('wp_enqueue_scripts', 'add_aside_styles');

function add_aside_styles()
{
    // enregistrement d'un nouveau style
    wp_register_style('main_style', get_template_directory_uri() . '/sources/style/style.css');
    wp_enqueue_style('main_style');
}
