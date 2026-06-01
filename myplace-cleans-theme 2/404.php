<?php
/**
 * 404 template.
 *
 * @package MyPlaceCleans
 */

get_header(); ?>

<section class="section" style="text-align:center;">
	<div class="container-mp">
		<span class="eyebrow"><?php esc_html_e( 'Error 404', 'myplace-cleans' ); ?></span>
		<h1 style="font-size:clamp(2.5rem,6vw,5rem);"><?php esc_html_e( 'Page not found.', 'myplace-cleans' ); ?></h1>
		<p class="text-mute" style="max-width:50ch;margin-inline:auto;">
			<?php esc_html_e( "The page you're looking for has moved or never existed. Try heading back home or get in touch — we're happy to help.", 'myplace-cleans' ); ?>
		</p>
		<div class="hero__actions" style="justify-content:center;">
			<a class="btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'myplace-cleans' ); ?></a>
			<a class="btn-ghost"   href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact us', 'myplace-cleans' ); ?></a>
		</div>
	</div>
</section>

<?php get_footer();
