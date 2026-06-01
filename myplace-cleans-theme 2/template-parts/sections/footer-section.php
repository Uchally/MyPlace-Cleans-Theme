<?php
/**
 * Footer Section — port of src/components/site/SiteFooter.tsx.
 *
 * Self-contained visual footer. The standard `footer.php` (invoked by
 * `get_footer()`) just closes the document and calls this partial, so you
 * can also drop it in standalone:
 *
 *   get_template_part( 'template-parts/sections/footer-section' );
 *
 * @package MyPlaceCleans
 */
defined( 'ABSPATH' ) || exit;
?>
<footer class="site-footer" role="contentinfo">
	<div class="container-mp">
		<div class="site-footer__grid">

			<div>
				<a class="site-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="site-brand__mark">✦</span>
					<span><?php bloginfo( 'name' ); ?><span class="site-brand__dot">.</span></span>
				</a>
				<p class="text-mute mt-4 site-footer__intro">
					<?php esc_html_e( 'Premium domestic, commercial and Airbnb cleaning across Newcastle Upon Tyne and the wider North East.', 'myplace-cleans' ); ?>
				</p>
				<?php myplace_social_links(); ?>
			</div>

			<div>
				<h4><?php esc_html_e( 'Services', 'myplace-cleans' ); ?></h4>
				<?php
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'container'      => false,
						'depth'          => 1,
					) );
				} else { ?>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/domestic/' ) ); ?>"><?php esc_html_e( 'Domestic Cleaning', 'myplace-cleans' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/commercial/' ) ); ?>"><?php esc_html_e( 'Commercial Cleaning', 'myplace-cleans' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/airbnb/' ) ); ?>"><?php esc_html_e( 'Airbnb & Property Management', 'myplace-cleans' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Us', 'myplace-cleans' ); ?></a></li>
					</ul>
				<?php } ?>
			</div>

			<div>
				<h4><?php esc_html_e( 'Contact', 'myplace-cleans' ); ?></h4>
				<ul>
					<li><a class="contact-item" href="tel:<?php echo esc_attr( myplace_opt( 'phone_link' ) ); ?>"><?php myplace_icon( 'phone' ); ?> <?php echo esc_html( myplace_opt( 'phone_display' ) ); ?></a></li>
					<li><a class="contact-item" href="https://wa.me/<?php echo esc_attr( myplace_opt( 'whatsapp_number' ) ); ?>" target="_blank" rel="noopener noreferrer"><?php myplace_icon( 'chat' ); ?> <?php echo esc_html( myplace_opt( 'whatsapp_display' ) ); ?></a></li>
					<li><a class="contact-item" href="mailto:<?php echo esc_attr( myplace_opt( 'email' ) ); ?>"><?php myplace_icon( 'mail' ); ?> <?php echo esc_html( myplace_opt( 'email' ) ); ?></a></li>
					<li><span class="contact-item"><?php myplace_icon( 'map' ); ?> <?php echo esc_html( myplace_opt( 'address' ) ); ?></span></li>
				</ul>
			</div>

			<div>
				<h4><?php esc_html_e( 'Hours', 'myplace-cleans' ); ?></h4>
				<ul>
					<li><?php echo esc_html( myplace_opt( 'hours_weekday' ) ); ?></li>
					<li><?php echo esc_html( myplace_opt( 'hours_saturday' ) ); ?></li>
					<li><?php echo esc_html( myplace_opt( 'hours_sunday' ) ); ?></li>
				</ul>
				<a class="btn-primary mt-4" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
					<?php esc_html_e( 'Book a Cleaning', 'myplace-cleans' ); ?>
				</a>
			</div>
		</div>

		<div class="site-footer__bottom">
			<span>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> · <?php esc_html_e( 'Newcastle Upon Tyne', 'myplace-cleans' ); ?></span>
			<span>
				<a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>"><?php esc_html_e( 'Privacy', 'myplace-cleans' ); ?></a> ·
				<a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms', 'myplace-cleans' ); ?></a> ·
				<a href="<?php echo esc_url( home_url( '/cookies/' ) ); ?>"><?php esc_html_e( 'Cookies', 'myplace-cleans' ); ?></a>
			</span>
		</div>
	</div>
</footer>
