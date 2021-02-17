<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;
$terms = get_the_terms( $post->ID, 'product_cat' );
foreach ($terms as $term) {
echo $product_cat_id = $term->term_id;
$thumbID = get_post_thumbnail_id( $product_cat_id );
$imgDestacada = wp_get_attachment_image_src( $thumbID, 'full' ); // Sustituir por thumbnail, medium, large o full
$pathImgDestacada = $imgDestacada[0];
 $pathImgDestacada;
break;
}

/*
WP_Term Object
(
[term_id] =>
[name] =>
[slug] =>
[term_group] =>
[term_taxonomy_id] =>
[taxonomy] =>
[description] =>
[parent] =>
[count] =>
[filter] =>
)*/

wc_get_template( 'archive-product.php' );
