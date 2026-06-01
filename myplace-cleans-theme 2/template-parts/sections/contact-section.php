<?php
/**
 * Contact Section — port of src/components/site/ContactForm.tsx.
 *
 * Submits to admin-post.php action `myplace_contact` (handler lives in
 * functions.php / inc/contact.php — fallback uses wp_mail to admin email).
 *
 * @package MyPlaceCleans
 */
defined( 'ABSPATH' ) || exit;

$mp_sent = isset( $_GET['contact'] ) && 'sent' === $_GET['contact']; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
?>
<section class="mp-section mp-contact" id="contact" aria-labelledby="mp-contact-title">
	<div class="container-mp mp-contact__grid">
		<div>
			<span class="eyebrow"><?php esc_html_e( 'Get in touch', 'myplace-cleans' ); ?></span>
			<h2 id="mp-contact-title">
				<?php esc_html_e( 'Request your', 'myplace-cleans' ); ?>
				<span class="accent"><?php esc_html_e( 'free quote.', 'myplace-cleans' ); ?></span>
			</h2>
			<p class="mp-section__lede">
				<?php esc_html_e( 'Tell us a little about your space and we\'ll come back within one business hour with a tailored quote.', 'myplace-cleans' ); ?>
			</p>

			<ul class="mp-contact__details">
				<li><a href="tel:<?php echo esc_attr( myplace_opt( 'phone_link' ) ); ?>"><?php myplace_icon( 'phone' ); ?> <?php echo esc_html( myplace_opt( 'phone_display' ) ); ?></a></li>
				<li><a href="mailto:<?php echo esc_attr( myplace_opt( 'email' ) ); ?>"><?php myplace_icon( 'mail' ); ?> <?php echo esc_html( myplace_opt( 'email' ) ); ?></a></li>
				<li><a href="https://wa.me/<?php echo esc_attr( myplace_opt( 'whatsapp_number' ) ); ?>" target="_blank" rel="noopener noreferrer"><?php myplace_icon( 'chat' ); ?> <?php echo esc_html( myplace_opt( 'whatsapp_display' ) ); ?></a></li>
			</ul>
		</div>

		<?php if ( $mp_sent ) : ?>
			<div class="card-surface mp-contact__success" role="status">
				<h3><?php esc_html_e( 'Thanks — message received.', 'myplace-cleans' ); ?></h3>
				<p><?php esc_html_e( 'We\'ll be in touch within one business hour.', 'myplace-cleans' ); ?></p>
			</div>
		<?php else : ?>
			<form class="card-surface mp-contact__form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="myplace_contact" />
				<?php wp_nonce_field( 'myplace_contact', 'myplace_contact_nonce' ); ?>

				<label>
					<span><?php esc_html_e( 'Your name', 'myplace-cleans' ); ?></span>
					<input type="text" name="mp_name" required maxlength="120" />
				</label>

				<label>
					<span><?php esc_html_e( 'Email', 'myplace-cleans' ); ?></span>
					<input type="email" name="mp_email" required maxlength="200" />
				</label>

				<label>
					<span><?php esc_html_e( 'Phone', 'myplace-cleans' ); ?></span>
					<input type="tel" name="mp_phone" maxlength="40" />
				</label>

				<label>
					<span><?php esc_html_e( 'Service', 'myplace-cleans' ); ?></span>
					<select name="mp_service">
						<option value="domestic"><?php esc_html_e( 'Domestic Cleaning', 'myplace-cleans' ); ?></option>
						<option value="commercial"><?php esc_html_e( 'Commercial Cleaning', 'myplace-cleans' ); ?></option>
						<option value="airbnb"><?php esc_html_e( 'Airbnb / Property', 'myplace-cleans' ); ?></option>
						<option value="other"><?php esc_html_e( 'Something else', 'myplace-cleans' ); ?></option>
					</select>
				</label>

				<label class="mp-contact__form-full">
					<span><?php esc_html_e( 'Tell us about your space', 'myplace-cleans' ); ?></span>
					<textarea name="mp_message" rows="4" maxlength="2000"></textarea>
				</label>

				<!-- honeypot -->
				<input type="text" name="mp_website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;" />

				<button type="submit" class="btn-primary mp-contact__form-full">
					<?php esc_html_e( 'Send Enquiry', 'myplace-cleans' ); ?> →
				</button>
			</form>
		<?php endif; ?>
	</div>
</section>
