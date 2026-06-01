<?php
/**
 * Testimonials Section — port of src/components/site/Testimonials.tsx.
 *
 * Self-contained: includes its own data array, markup and a tiny inline
 * vanilla-JS carousel (no jQuery, no build step needed).
 *
 * @package MyPlaceCleans
 */
defined( 'ABSPATH' ) || exit;

$mp_quotes = array(
	array(
		'quote'  => __( 'MyPlace have been cleaning our home for two years now. Always on time, always thorough, always lovely. I wouldn\'t use anyone else.', 'myplace-cleans' ),
		'name'   => 'Sarah Whitfield',
		'role'   => __( 'Jesmond · Domestic client', 'myplace-cleans' ),
		'rating' => 5,
	),
	array(
		'quote'  => __( 'We manage 14 Airbnb properties across Newcastle and the team turn them around flawlessly. Linen, restocking, the lot. Total game-changer.', 'myplace-cleans' ),
		'name'   => 'Daniel Hughes',
		'role'   => __( 'Hughes Stays · Airbnb host', 'myplace-cleans' ),
		'rating' => 5,
	),
	array(
		'quote'  => __( 'Our office has never looked better. Professional, discreet and proactive — they flag issues before we even notice them.', 'myplace-cleans' ),
		'name'   => 'Laura Bennett',
		'role'   => __( 'Office Manager, Quayside Studios', 'myplace-cleans' ),
		'rating' => 5,
	),
	array(
		'quote'  => __( 'Booked them for an end-of-tenancy deep clean and got our full deposit back. Genuinely brilliant attention to detail.', 'myplace-cleans' ),
		'name'   => 'Marcus Reid',
		'role'   => __( 'Heaton · Tenant', 'myplace-cleans' ),
		'rating' => 5,
	),
);
?>
<section class="mp-section mp-testimonials" id="testimonials" aria-labelledby="mp-testimonials-title">
	<div class="container-mp">
		<span class="eyebrow"><?php esc_html_e( 'Client voices', 'myplace-cleans' ); ?></span>
		<h2 id="mp-testimonials-title">
			<?php esc_html_e( 'Loved by people across', 'myplace-cleans' ); ?>
			<span class="accent"><?php esc_html_e( 'Newcastle.', 'myplace-cleans' ); ?></span>
		</h2>

		<div class="mp-testimonials__carousel" data-mp-testimonials>
			<?php foreach ( $mp_quotes as $i => $q ) : ?>
				<figure class="mp-testimonials__slide<?php echo 0 === $i ? ' is-active' : ''; ?>" data-index="<?php echo (int) $i; ?>">
					<div class="mp-testimonials__stars" aria-label="<?php echo esc_attr( sprintf( __( '%d out of 5 stars', 'myplace-cleans' ), $q['rating'] ) ); ?>">
						<?php echo str_repeat( '★', (int) $q['rating'] ); ?>
					</div>
					<blockquote>&ldquo;<?php echo esc_html( $q['quote'] ); ?>&rdquo;</blockquote>
					<figcaption>
						<strong><?php echo esc_html( $q['name'] ); ?></strong>
						<span class="text-mute"><?php echo esc_html( $q['role'] ); ?></span>
					</figcaption>
				</figure>
			<?php endforeach; ?>

			<div class="mp-testimonials__controls">
				<button type="button" data-mp-prev aria-label="<?php esc_attr_e( 'Previous', 'myplace-cleans' ); ?>">‹</button>
				<button type="button" data-mp-next aria-label="<?php esc_attr_e( 'Next', 'myplace-cleans' ); ?>">›</button>
			</div>

			<div class="mp-testimonials__dots" role="tablist">
				<?php foreach ( $mp_quotes as $i => $q ) : ?>
					<button type="button" role="tab" data-mp-dot="<?php echo (int) $i; ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Go to testimonial %d', 'myplace-cleans' ), $i + 1 ) ); ?>"<?php echo 0 === $i ? ' aria-selected="true"' : ''; ?>></button>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<script>
(function(){
	var root = document.currentScript.previousElementSibling;
	if (!root) return;
	var carousel = root.querySelector('[data-mp-testimonials]');
	if (!carousel) return;
	var slides = carousel.querySelectorAll('.mp-testimonials__slide');
	var dots   = carousel.querySelectorAll('[data-mp-dot]');
	var i = 0, n = slides.length, timer;
	function go(next){
		slides[i].classList.remove('is-active');
		if (dots[i]) dots[i].removeAttribute('aria-selected');
		i = (next + n) % n;
		slides[i].classList.add('is-active');
		if (dots[i]) dots[i].setAttribute('aria-selected','true');
	}
	carousel.querySelector('[data-mp-prev]').addEventListener('click', function(){ go(i-1); reset(); });
	carousel.querySelector('[data-mp-next]').addEventListener('click', function(){ go(i+1); reset(); });
	dots.forEach(function(d){ d.addEventListener('click', function(){ go(parseInt(d.dataset.mpDot,10)); reset(); }); });
	function start(){ timer = setInterval(function(){ go(i+1); }, 7000); }
	function reset(){ clearInterval(timer); start(); }
	start();
})();
</script>
