<?php
/**
 * Airbnb Section — port of src/routes/airbnb.tsx.
 *
 * @package MyPlaceCleans
 */
defined( 'ABSPATH' ) || exit;
?>
<section class="mp-section mp-airbnb" aria-labelledby="mp-airbnb-title">
	<div class="container-mp">
		<span class="eyebrow"><?php esc_html_e( 'Airbnb & Property', 'myplace-cleans' ); ?></span>
		<h2 id="mp-airbnb-title">
			<?php esc_html_e( '5-star turnovers,', 'myplace-cleans' ); ?>
			<span class="accent"><?php esc_html_e( 'every single guest.', 'myplace-cleans' ); ?></span>
		</h2>
		<p class="mp-section__lede">
			<?php esc_html_e( 'Same-day turnovers, hotel-grade linen service, restocking and condition reports — built for hosts who care about reviews.', 'myplace-cleans' ); ?>
		</p>

		<div class="grid-3 mt-8">
			<article class="card-surface">
				<h3><?php esc_html_e( 'Same-Day Turnovers', 'myplace-cleans' ); ?></h3>
				<p class="text-mute"><?php esc_html_e( 'Tight check-out to check-in windows handled flawlessly.', 'myplace-cleans' ); ?></p>
			</article>
			<article class="card-surface">
				<h3><?php esc_html_e( 'Linen & Restock', 'myplace-cleans' ); ?></h3>
				<p class="text-mute"><?php esc_html_e( 'Crisp hotel-grade linen, towels and consumables managed for you.', 'myplace-cleans' ); ?></p>
			</article>
			<article class="card-surface">
				<h3><?php esc_html_e( 'Condition Reports', 'myplace-cleans' ); ?></h3>
				<p class="text-mute"><?php esc_html_e( 'Photo reports after every clean so issues never reach a review.', 'myplace-cleans' ); ?></p>
			</article>
		</div>

		<div class="mp-section__cta">
			<a class="btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
				<?php esc_html_e( 'Talk to Our Host Team', 'myplace-cleans' ); ?> →
			</a>
		</div>
	</div>
</section>
