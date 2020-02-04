<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title><?php bloginfo('name'); ?></title>
    <!-- Appel du fichier style.css de notre thème -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php bloginfo('description') ?>">
    <!-- Execution de la fonction wp_head() obligatoire ! -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="header">
        <div class="logo">
            <a class="stolz" href='/'>Goinden<br><span>2020</span></a>
        </div>
        <nav class="menu">
            <?php
            if (has_nav_menu('header-menu')) {
                wp_nav_menu([
                    'theme_location' => 'header-menu',
                    'menu_class' => 'montserrat', // classe CSS pour customiser mon menu
                ]);
            }
            ?>
        </nav>
    </header>