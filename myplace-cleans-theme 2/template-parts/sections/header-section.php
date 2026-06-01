<?php
/**
 * Header Section — port of src/components/site/SiteHeader.tsx.
 *
 * NOTE: WordPress's standard `header.php` is still the document <head>
 * wrapper invoked by `get_header()`. This file is the *visual* site header
 * (logo + nav + CTA) so it can be dropped in independently if needed:
 *
 *   get_template_part( 'template-parts/sections/header-section' );
 *
 * The default `header.php` already calls this partial.
 *
 * @package MyPlaceCleans
 */
defined( 'ABSPATH' ) || exit;
?>
<header class="site-header" role="banner">
	<div class="container-mp site-header__inner">

		<?php if ( has_custom_logo() ) : ?>
			<div class="site-brand"><?php the_custom_logo(); ?></div>
		<?php else : ?>
			<a class="site-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<span class="site-brand__mark">✦</span>
				<span><?php bloginfo( 'name' ); ?><span class="site-brand__dot">.</span></span>
			</a>
		<?php endif; ?>

		<nav class="main-nav" aria-label="<?php esc_attr_e( 'Primary', 'myplace-cleans' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'main-nav__list',
				'fallback_cb'    => 'myplace_primary_menu_fallback',
				'depth'          => 2,
			) );
			?>
		</nav>

		<div class="header-cta">
			<a class="header-cta__phone" href="tel:<?php echo esc_attr( myplace_opt( 'phone_link' ) ); ?>">
				<?php echo esc_html( myplace_opt( 'phone_display' ) ); ?>
			</a>
			<a class="btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
				<?php esc_html_e( 'Get a Quote', 'myplace-cleans' ); ?>
			</a>
		</div>

		<button class="nav-toggle" type="button" aria-controls="mobile-nav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle menu', 'myplace-cleans' ); ?>">
			<span class="nav-toggle__open"><?php myplace_icon( 'menu' ); ?></span>
			<span class="nav-toggle__close" hidden><?php myplace_icon( 'close' ); ?></span>
		</button>
	</div>

	<div id="mobile-nav" class="mobile-nav" hidden>
		<div class="container-mp">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'mobile-nav__list',
				'fallback_cb'    => 'myplace_primary_menu_fallback',
				'depth'          => 2,
			) );
			?>
			<a class="btn-primary mobile-nav__cta" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
				<?php esc_html_e( 'Get a Quote', 'myplace-cleans' ); ?>
			</a>
		</div>
	</div>
</header>
