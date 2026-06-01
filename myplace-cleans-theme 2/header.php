<?php
/**
 * Header template — document head + visual header partial.
 *
 * @package MyPlaceCleans
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="screen-reader-text" href="#site-content"><?php esc_html_e( 'Skip to content', 'myplace-cleans' ); ?></a>

<?php get_template_part( 'template-parts/sections/header-section' ); ?>

<main id="site-content" class="site-content" role="main">
