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
<body <?php body_class() ?>>

<header class="site-header">
    <div class="contenedor">
        <div class="barra-navegacion">
            <div class="logo">
                <a href="<?php echo esc_url(site_url('/')); ?>">
                    <img src=<?php echo get_template_directory_uri()."/img/antojosfit_bg_white.png" ?> alt="logo">
                </a>
            </div>

            <div class="logo-minimizado">
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

    <div class=" tagline text-center">
        <h1><?php the_field('encabezado_hero'); ?></h1>
        <p><?php the_field('contenido_hero'); ?></p>
    </div>

</header>
<div class="bg">