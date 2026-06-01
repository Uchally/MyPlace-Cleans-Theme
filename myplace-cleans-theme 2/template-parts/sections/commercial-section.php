<?php
/**
 * Commercial Section — port of src/routes/commercial.tsx.
 *
 * @package MyPlaceCleans
 */
defined( 'ABSPATH' ) || exit;
?>
<section class="mp-section mp-commercial mp-section--deep" aria-labelledby="mp-commercial-title">
	<div class="container-mp">
		<span class="eyebrow"><?php esc_html_e( 'Commercial Cleaning', 'myplace-cleans' ); ?></span>
		<h2 id="mp-commercial-title">
			<?php esc_html_e( 'Workspaces that', 'myplace-cleans' ); ?>
			<span class="accent"><?php esc_html_e( 'inspire confidence.', 'myplace-cleans' ); ?></span>
		</h2>
		<p class="mp-section__lede">
			<?php esc_html_e( 'Offices, retail, clinics and shared spaces serviced by insured, uniformed teams. Flexible schedules, key-holder service and full COSHH compliance.', 'myplace-cleans' ); ?>
		</p>

		<div class="grid-3 mt-8">
			<article class="card-surface">
				<h3><?php esc_html_e( 'Offices', 'myplace-cleans' ); ?></h3>
				<p class="text-mute"><?php esc_html_e( 'Daily, evening or weekend cleans that respect your team\'s rhythm.', 'myplace-cleans' ); ?></p>
			</article>
			<article class="card-surface">
				<h3><?php esc_html_e( 'Retail & Hospitality', 'myplace-cleans' ); ?></h3>
				<p class="text-mute"><?php esc_html_e( 'Customer-facing spaces kept pristine before doors open.', 'myplace-cleans' ); ?></p>
			</article>
			<article class="card-surface">
				<h3><?php esc_html_e( 'Healthcare & Clinics', 'myplace-cleans' ); ?></h3>
				<p class="text-mute"><?php esc_html_e( 'Hospital-grade disinfection protocols, fully documented.', 'myplace-cleans' ); ?></p>
			</article>
		</div>

		<div class="mp-section__cta">
			<a class="btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
				<?php esc_html_e( 'Request a Site Visit', 'myplace-cleans' ); ?> →
			</a>
		</div>
	</div>
</section>
