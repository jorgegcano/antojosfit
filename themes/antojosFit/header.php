<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Esto carga el hook de la hoja de estilos y scripts -->
    <?php wp_head() ?>
    <title>anto.jos FIT (DEV)</title>
</head>
<body <?php body_class();?> >

<header class="site-header">
        <div class="contenedor">
            <div class="barra-navegacion">

                <div class="logo-letras">
                <a href="<?php echo esc_url(site_url('/')); ?>">
                    <img src=<?php echo get_template_directory_uri()."/img/anto-jos-fit-TYPO_white.png" ?> width=200 alt="logo">
                </a>
            </div>
                <?php
                $args = array(
                    'theme_location' => 'menu_principal',
                    'container' => 'nav',
                    'container_class' => 'menu-principal'
                );
                wp_nav_menu($args);
                $args = array(
                    'theme_location' => 'menu_principal_2',
                    'container' => 'div',
                    'container_class' => 'menu-principal-2'
                );
                wp_nav_menu($args);
                /*
                global $current_user; //wp_get_current_user();
                if ( is_user_logged_in() ) {
                 echo 'Username: ' . $current_user->user_login . "\n"; echo 'User display name: ' . $current_user->display_name . "\n"; }
    */
                 ?>
            </div>
        </div>
    </header>
    <?php

    if (is_shop()) {
        echo "<div class='header-background'"; get_url_hero_image_shop(); echo "><h1 class='title-hero-size' style='color:#ffffff;text-shadow: 0.1em 0.1em 0.2em black'>Carta</h1></div>";
    } elseif (is_home()) {
        echo "<div class='header-background'><h1 class='title-hero-size' style='color:#ffffff;text-shadow: 0.1em 0.1em 0.2em black'>Blog</h1></div>";
    } elseif (is_page("alergenos")) {
        echo "<div class='header-background'"; get_url_hero_image_alergenos(); echo "><h1 class='title-hero-size' style='color:#ffffff;text-shadow: 0.1em 0.1em 0.2em black'>Alérgenos</h1></div>";
    }