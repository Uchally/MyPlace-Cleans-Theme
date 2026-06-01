<?php
/**
 * Template Name: Services Landing
 * Description: Wide layout for service landing pages with hero + content.
 *
 * @package MyPlaceCleans
 */

get_header();

while ( have_posts() ) :
	the_post(); ?>

	<section class="page-hero">
		<div class="container-mp">
			<span class="eyebrow"><?php esc_html_e( 'Our services', 'myplace-cleans' ); ?></span>
			<h1><?php the_title(); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<article <?php post_class( 'section' ); ?>>
		<div class="container-mp entry-content">
			<?php the_content(); ?>
		</div>
	</article>

	<section class="section section--deep" style="text-align:center;">
		<div class="container-mp">
			<h2><?php esc_html_e( 'Ready to book?', 'myplace-cleans' ); ?></h2>
			<p class="text-mute"><?php esc_html_e( 'Tell us about your space — we respond within one business day.', 'myplace-cleans' ); ?></p>
			<a class="btn-primary mt-4" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Request a Quote', 'myplace-cleans' ); ?></a>
		</div>
	</section>

<?php endwhile;

get_footer();
