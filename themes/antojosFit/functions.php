<?php

/** Consultas reutilizables **/
require get_template_directory().'/inc/queries.php';

/** shortcodes **/
require get_template_directory().'/inc/shortcodes.php';

//Cuando el tema es activado

function antojosfit_setup() {
//Habilitar imágenes destacadas
add_theme_support('post-thumbnails');

add_theme_support( 'woocommerce', array(
    'thumbnail_image_width' => 700,
    //'gallery_thumbnail_image_width' => 100,
    //'single_image_width' => 500,
    ) );

//Habilitar títulos SEO
add_theme_support('title-tag');

//Agregar imágenes de tamaño personalizado (nombre, ancho, alto y recortado)

add_image_size('square', 350, 350, true);
add_image_size('portrait', 350, 724, true);
/*
add_image_size('cajas', 400, 375, true);
add_image_size('mediano', 700, 400, true);
add_image_size('blog', 966, 644, true);
*/
}
add_action('after_setup_theme', 'antojosfit_setup');

//Crear menús: se define el espacio en el que se crea, se asigna y se indica dónde lo vamos a ver
//1. Se crea aquí
function antojosfit_menus() {
    register_nav_menus( array(
        'menu_principal' => __('Menú Principal', 'antojosfit'),
        'menu_principal_2' => __('Menú Principal 2', 'antojosfit')
    ));
}

add_action('init', 'antojosfit_menus');
//2. Se asigna en BO
//3. Se llama desde el template con "theme_location"


//Scripts y Styles
function antojosfit_scripts_styles() {

    //Cargamos normalize
    wp_enqueue_style('normalize', get_template_directory_uri().'/css/normalize.css', array(), '8.0.1');

    //Cargamos Google Font
    wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;500;600&display=swap', array(), '1.0.0');


    //Cargamos Leaflet
    if(is_page('contacto')) :
        wp_enqueue_style('leafletCSS', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css', array(), '1.7.1');
    endif;

    //Cargamos BxSlider
    //if(is_page('product')) :
        wp_enqueue_style('bxSliderCSS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12');
    //endif;

    //Carga de slickNav
    wp_enqueue_style( 'slicknavCSS', get_template_directory_uri().'/css/slicknav.min.css', array(), '1.0.0');

    //Cargamos la hoja de estilos principal (style.css). En las dependencias metemos todas líneas que vamos cargando
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'googleFont'), '1.0.0');

    //Cargamos scripts:

    //Cargamos script slicknav
    wp_enqueue_script('slicknavJS', get_template_directory_uri().'/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true);

    //Cargamos script Leaflet
    if(is_page('contacto')) :
        wp_enqueue_script('leafletJS', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js', array(), '1.7.1', true);
    endif;

    //Cargamos script BxSlider
    //if(is_page('product')) :
        wp_enqueue_script('bxSliderJS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
    //endif;

    //Cargamos el script principal
    wp_enqueue_script('js', get_template_directory_uri().'/js/js.js', array('jquery', 'slicknavJS'), '1.0.0', true);
}

//este hook va a cargar todas las hojas de estilos que tengamos dentro del tema
add_action('wp_enqueue_scripts', 'antojosfit_scripts_styles');


//Definir zona de widgets
function antojosfit_widgets() {
    register_sidebar( array(
        'name' =>'Sidebar 1',
        'id'=> 'sidebar_1',
        'before_widget'=> '<div class="widget">',
        'after_widget'=> '</div>',
        'before_title'=> '<h3 class="text-center texto-primario">',
        'after_title'=> '</h3>',
    ));
    register_sidebar( array(
        'name' =>'Sidebar 2',
        'id'=> 'sidebar_2',
        'before_widget'=> '<div class="widget">',
        'after_widget'=> '</div>',
        'before_title'=> '<h3 class="text-center texto-primario">',
        'after_title'=> '</h3>',
    ));
}
add_action( 'widgets_init', 'antojosfit_widgets' );

/** Imagen Hero **/

function antojosfit_hero_image() {
    //obtenerid página principal
    $front_page_id = get_option('page_on_front');
    $blog_page_id = get_option('page_for_posts');

    //Obtener id imagen
    $id_imagen = get_field('imagen_hero', $front_page_id);
    $id_imagen_blog = get_field('imagen_hero_blog', $blog_page_id);
    //Obtener la imagen
    $imagen =wp_get_attachment_image_src($id_imagen, 'full')[0];
    $imagen_blog =wp_get_attachment_image_src($id_imagen_blog, 'full')[0];

    //Style CSS
    wp_register_style('custom', false);
    wp_enqueue_style('custom');
    $imagen_destacada_css = "body.home .site-header {
        background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url($imagen);
    }";
    $imagen_destacada_blog_css = "body.blog .header-background {
        background: url($imagen_blog);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: calc(100vh - 100px);
        display: flex;
        justify-content: center;
        align-items: center;
    }";
    wp_add_inline_style('custom', $imagen_destacada_css);
    wp_add_inline_style('custom', $imagen_destacada_blog_css);
}

add_action('init', 'antojosfit_hero_image');

function get_url_hero_image_shop() {
    $shop_page_id = get_option('woocommerce_shop_page_id');
    $thumbID = get_post_thumbnail_id( $shop_page_id );
    $imgDestacada = wp_get_attachment_image_src( $thumbID, 'full' ); // Sustituir por thumbnail, medium, large o full
    $pathImgDestacada = $imgDestacada[0];
    echo "style='background: url($pathImgDestacada);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    height: calc(100vh - 100px);
    display: flex;
    justify-content: center;
    align-items: center'";
}

/**
* Show the subcategory title in the product loop.
*
* @param object $category Category object.
*/
function woocommerce_template_loop_category_title( $category ) {
    ?>
        <h2 class="woocommerce-loop-category__title"> <?php echo esc_html( $category->name ); ?></h2>
    <?php
}

add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );

function woocommerce_category_image() {
    if ( is_product_category() ){
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_url( $thumbnail_id );
        if ( $image ) {
            echo "<div style='display: flex; justify-content: center; align-items: center; height:calc(100vh - 100px);background:url($image);background-repeat: no-repeat;background-size: cover;background-position: center;'><h1 style='color:#ffffff;text-shadow: 0.1em 0.1em 0.2em black'>$cat->name</h1></div>";
        }
    }
}

function ja_remove_body_classes( $wp_classes ) {
    // The classes you wish to remove
    $blacklist = array( 'woocommerce', 'woocommerce-page');
    // Remove classes from array
    $wp_classes = array_diff( $wp_classes, $blacklist );
    // Return modified body class array
    return $wp_classes;
}

add_filter( 'body_class', 'ja_remove_body_classes', 10, 2 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

/*
add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
    return array(
        'width' => 600,
        //'height' => 400,
        'crop' => 0,
    );
} );
*/


function wc_get_gallery_image_html_custom( $attachment_id, $main_image = false ) {
	$flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
	$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
	$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
	$image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
	$full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
	$thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
	$full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
	$alt_text          = trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
	$image             = wp_get_attachment_image(
		$attachment_id,
		$image_size,
		false,
		apply_filters(
			'woocommerce_gallery_image_html_attachment_image_params',
			array(
				'title'                   => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
				'data-caption'            => _wp_specialchars( get_post_field( 'post_excerpt', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
				'data-src'                => esc_url( $full_src[0] ),
				'data-large_image'        => esc_url( $full_src[0] ),
				'data-large_image_width'  => esc_attr( $full_src[1] ),
				'data-large_image_height' => esc_attr( $full_src[2] ),
				'class'                   => esc_attr( $main_image ? 'wp-post-image' : '' ),
			),
			$attachment_id,
			$image_size,
			$main_image
		)
	);

	return $image;
}

add_filter( 'woocommerce_quantity_input_args', 'jk_woocommerce_quantity_input_args', 10, 2 ); // Simple products

function jk_woocommerce_quantity_input_args( $args, $product ) {

    if ( is_singular( 'product' ) ) {
		$args['input_value'] = 1;	// Starting value (we only want to affect product pages, not cart)
    }

    $id = $product->get_id();

    if ( $id == 206 ) {
        //Cheesecake de lúcuma con brownie
        $max = 3;
    }
    elseif ($id == 207){
        //cheesecake de carrotcake
        $max = 3;
    }
    elseif ($id == 208){
        //cheesecake de chocolate
        $max = 3;
    }
    elseif ($id == 209){
        //cookies veganas
        $max = 5;
    }
    elseif ($id == 210){
        //brownies
        $max = 3;
    }
    elseif ($id == 211){
        //power bites
        $max = 3;
    }
    elseif ($id == 212){
        //brookie
        $max = 3;
    }

    global $woocommerce;

    foreach( $woocommerce->cart->cart_contents as $product_in_cart ) {
        if($product_in_cart['product_id'] == $id && $product_in_cart['quantity'] >= $max) {
            $max_cart_content = 1;
        }
    }

    echo "<input type='hidden' id='max-value' value=".$max.">";
    echo "<input type='hidden' id='aux' value=".$max_cart_content.">";

    $args['max_value'] = $max;  // Max value
	$args['min_value'] 	= 1;   	// Minimum value
	$args['step'] 		= 1;    // Quantity steps
	return $args;
}

// Cantidad máxima de productos a comprar
add_action( 'woocommerce_check_cart_items', 'set_max_quantity_per_product' );
function set_max_quantity_per_product() {
    // Only run in the Cart or Checkout pages
    if( is_cart() || is_checkout() ) {
        global $woocommerce;
        $i = 0;

        // Lista de productos según su ID y cantidad máxima
        $product_max_qty = array(
            array( 'id' => 206, 'max' => 3 ), //cheesecake de lúcuma con brownie
            array( 'id' => 207, 'max' => 3 ), //cheesecake de carrotcake
            array( 'id' => 208, 'max' => 3 ), //cheesecake de chocolate
            array( 'id' => 209, 'max' => 5 ), //cookies veganas
            array( 'id' => 210, 'max' => 3 ), //brownies
            array( 'id' => 211, 'max' => 3 ), //power bites
            array( 'id' => 212, 'max' => 3 ), //brookie
        );

        // Array de productos que no cumplen la condición
        $bad_products = array();

  // Comprobar número de productos
        foreach( $woocommerce->cart->cart_contents as $product_in_cart ) {

            foreach( $product_max_qty as $product_to_test ) {

                if( $product_to_test['id'] == $product_in_cart['product_id'] ) {

                    if( $product_in_cart['quantity'] > $product_to_test['max'] ) {

                        $bad_products[$i]['id'] = $product_in_cart['product_id'];
                        $bad_products[$i]['in_cart'] = $product_in_cart['quantity'];
                        $bad_products[$i]['max_req'] = $product_to_test['max'];
                    }
                }
            }
            $i++;
        }

        // Mensaje de error cuando se ha alcanzado el máximo
        if( is_array( $bad_products) && count( $bad_products ) >= 1 ) {

            $message = 'Lo sentimos. Pero algunos productos no pueden exceder de una cantidad determinada.<br/>';
            foreach( $bad_products as $bad_product ) {

                $message .= 'El producto "'. get_the_title( $bad_product['id'] ) .'" requiere una cantidad máxima de '. $bad_product['max_req'] .' unidades'.'. Usted ha incluido '. $bad_product['in_cart'] .'.';
            }
            wc_add_notice( $message, 'error' );
        }

    }
}





