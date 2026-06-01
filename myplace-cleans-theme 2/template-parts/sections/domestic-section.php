<?php
/**
 * Domestic Section — port of src/routes/domestic.tsx hero block.
 *
 * @package MyPlaceCleans
 */
defined( 'ABSPATH' ) || exit;
?>
<section class="mp-section mp-domestic" aria-labelledby="mp-domestic-title">
	<div class="container-mp">
		<span class="eyebrow"><?php esc_html_e( 'Domestic Cleaning', 'myplace-cleans' ); ?></span>
		<h2 id="mp-domestic-title">
			<?php esc_html_e( 'A spotless home,', 'myplace-cleans' ); ?>
			<span class="accent"><?php esc_html_e( 'every single time.', 'myplace-cleans' ); ?></span>
		</h2>
		<p class="mp-section__lede">
			<?php esc_html_e( 'Weekly, fortnightly or one-off cleans tailored to your home. Vetted cleaners, eco-friendly products, and a quality guarantee on every visit.', 'myplace-cleans' ); ?>
		</p>

		<div class="grid-3 mt-8">
			<article class="card-surface">
				<h3><?php esc_html_e( 'Regular Cleans', 'myplace-cleans' ); ?></h3>
				<p class="text-mute"><?php esc_html_e( 'Same cleaner each visit, a checklist tailored to your home.', 'myplace-cleans' ); ?></p>
			</article>
			<article class="card-surface">
				<h3><?php esc_html_e( 'Deep Cleans', 'myplace-cleans' ); ?></h3>
				<p class="text-mute"><?php esc_html_e( 'Top-to-bottom restorative clean for move-ins or seasonal refreshes.', 'myplace-cleans' ); ?></p>
			</article>
			<article class="card-surface">
				<h3><?php esc_html_e( 'End of Tenancy', 'myplace-cleans' ); ?></h3>
				<p class="text-mute"><?php esc_html_e( 'Deposit-back guarantee with a fully itemised inventory clean.', 'myplace-cleans' ); ?></p>
			</article>
		</div>

		<div class="mp-section__cta">
			<a class="btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
				<?php esc_html_e( 'Get a Domestic Quote', 'myplace-cleans' ); ?> →
			</a>
		</div>
	</div>
</section>
