<?php
/**
 * Hero Section — port of src/components/site/Hero.tsx
 *
 * Self-contained. Use anywhere with:
 *   get_template_part( 'template-parts/sections/hero-section' );
 *
 * @package MyPlaceCleans
 */

defined( 'ABSPATH' ) || exit;

$hero_img = get_template_directory_uri() . '/assets/images/hero.jpg';
?>
<section class="mp-hero" aria-labelledby="mp-hero-title">
	<div class="container-mp mp-hero__inner">
		<div class="mp-hero__copy">
			<span class="eyebrow"><?php esc_html_e( 'Newcastle Upon Tyne · Est. 2018', 'myplace-cleans' ); ?></span>

			<h1 id="mp-hero-title" class="mp-hero__title">
				<?php esc_html_e( 'Professional cleaning services', 'myplace-cleans' ); ?>
				<span class="accent"><?php esc_html_e( 'you can trust.', 'myplace-cleans' ); ?></span>
			</h1>

			<p class="mp-hero__body">
				<?php esc_html_e( 'Exceptional domestic and commercial cleaning with unmatched attention to detail — delivered by a reliable, vetted team across Newcastle and the North East.', 'myplace-cleans' ); ?>
			</p>

			<div class="mp-hero__actions">
				<a class="btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
					<?php esc_html_e( 'Get a Quote', 'myplace-cleans' ); ?> →
				</a>
				<a class="btn-ghost" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
					<?php esc_html_e( 'Book Now', 'myplace-cleans' ); ?>
				</a>
			</div>

			<ul class="mp-hero__trust">
				<li>✓ <?php esc_html_e( 'Fully insured team', 'myplace-cleans' ); ?></li>
				<li>★ <?php esc_html_e( '4.9 average rating', 'myplace-cleans' ); ?></li>
				<li><?php esc_html_e( '500+ happy clients', 'myplace-cleans' ); ?></li>
			</ul>
		</div>

		<div class="mp-hero__media">
			<img
				src="<?php echo esc_url( $hero_img ); ?>"
				alt="<?php esc_attr_e( 'Sun-drenched living room cleaned to a premium standard', 'myplace-cleans' ); ?>"
				width="1600" height="1024" loading="eager" />
			<div class="mp-hero__badge">
				<div>
					<small><?php esc_html_e( 'Next available slot', 'myplace-cleans' ); ?></small>
					<strong><?php esc_html_e( 'Tomorrow · 9:00 AM', 'myplace-cleans' ); ?></strong>
				</div>
				<a class="btn-primary btn-primary--sm" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
					<?php esc_html_e( 'Book', 'myplace-cleans' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
