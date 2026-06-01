<?php
/**
 * MyPlace Cleans — Theme Customizer
 *
 * Adds Customizer panels for branding colors, contact details and social links.
 * Edit values under: Appearance → Customize.
 *
 * @package MyPlaceCleans
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Defaults — single source of truth, also used by myplace_opt() in templates.
 */
function myplace_customizer_defaults() {
	return array(
		// Colors.
		'brand_color'        => '#ffcd01',
		'slate_deep'         => '#2a313d',
		'slate_bg'           => '#1f242d',
		'ink_color'          => '#f3f5f8',

		// Contact.
		'phone_display'      => '0191 123 4567',
		'phone_link'         => '+441911234567',
		'whatsapp_display'   => '07534 446395',
		'whatsapp_number'    => '447534446395', // international, no +.
		'email'              => 'enquiry@myplacecleans.co.uk',
		'address'            => 'Newcastle Upon Tyne',

		// Hours.
		'hours_weekday'      => 'Mon – Fri · 8:00 – 18:00',
		'hours_saturday'     => 'Saturday · 9:00 – 16:00',
		'hours_sunday'       => 'Sunday · By appointment',

		// Social.
		'social_facebook'    => '',
		'social_instagram'   => '',
		'social_twitter'     => '',
		'social_linkedin'    => '',
		'social_tiktok'      => '',
		'social_youtube'     => '',
	);
}

/**
 * Read a Customizer option with default fallback.
 */
function myplace_opt( $key ) {
	$defaults = myplace_customizer_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	return get_theme_mod( 'myplace_' . $key, $default );
}

/**
 * Register Customizer settings & controls.
 */
function myplace_customize_register( $wp_customize ) {
	$defaults = myplace_customizer_defaults();

	// Make site identity controls live-preview.
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	/* ---------- Panel: Theme Options ---------- */
	$wp_customize->add_panel( 'myplace_panel', array(
		'title'       => __( 'MyPlace Theme Options', 'myplace-cleans' ),
		'description' => __( 'Logo, colors, contact details and social links.', 'myplace-cleans' ),
		'priority'    => 30,
	) );

	/* ---------- Section: Branding (colors) ---------- */
	$wp_customize->add_section( 'myplace_branding', array(
		'title' => __( 'Branding Colors', 'myplace-cleans' ),
		'panel' => 'myplace_panel',
	) );

	$color_fields = array(
		'brand_color' => __( 'Brand accent (yellow)', 'myplace-cleans' ),
		'slate_deep'  => __( 'Slate deep (surfaces)', 'myplace-cleans' ),
		'slate_bg'    => __( 'Page background', 'myplace-cleans' ),
		'ink_color'   => __( 'Body text', 'myplace-cleans' ),
	);
	foreach ( $color_fields as $key => $label ) {
		$wp_customize->add_setting( 'myplace_' . $key, array(
			'default'           => $defaults[ $key ],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'myplace_' . $key, array(
			'label'   => $label,
			'section' => 'myplace_branding',
		) ) );
	}

	/* ---------- Section: Contact ---------- */
	$wp_customize->add_section( 'myplace_contact', array(
		'title' => __( 'Contact Details', 'myplace-cleans' ),
		'panel' => 'myplace_panel',
	) );

	$text_fields = array(
		'phone_display'    => array( __( 'Phone (display)', 'myplace-cleans' ), 'sanitize_text_field' ),
		'phone_link'       => array( __( 'Phone (tel: link, e.g. +441911234567)', 'myplace-cleans' ), 'sanitize_text_field' ),
		'whatsapp_display' => array( __( 'WhatsApp (display)', 'myplace-cleans' ), 'sanitize_text_field' ),
		'whatsapp_number'  => array( __( 'WhatsApp number (international, digits only, e.g. 447534446395)', 'myplace-cleans' ), 'sanitize_text_field' ),
		'email'            => array( __( 'Email address', 'myplace-cleans' ), 'sanitize_email' ),
		'address'          => array( __( 'Address / city', 'myplace-cleans' ), 'sanitize_text_field' ),
		'hours_weekday'    => array( __( 'Hours — weekdays', 'myplace-cleans' ), 'sanitize_text_field' ),
		'hours_saturday'   => array( __( 'Hours — Saturday', 'myplace-cleans' ), 'sanitize_text_field' ),
		'hours_sunday'     => array( __( 'Hours — Sunday', 'myplace-cleans' ), 'sanitize_text_field' ),
	);
	foreach ( $text_fields as $key => $cfg ) {
		list( $label, $sanitize ) = $cfg;
		$wp_customize->add_setting( 'myplace_' . $key, array(
			'default'           => $defaults[ $key ],
			'sanitize_callback' => $sanitize,
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( 'myplace_' . $key, array(
			'label'   => $label,
			'section' => 'myplace_contact',
			'type'    => 'text',
		) );
	}

	/* ---------- Section: Social Links ---------- */
	$wp_customize->add_section( 'myplace_social', array(
		'title'       => __( 'Social Links', 'myplace-cleans' ),
		'description' => __( 'Leave blank to hide an icon.', 'myplace-cleans' ),
		'panel'       => 'myplace_panel',
	) );

	$social_fields = array(
		'social_facebook'  => __( 'Facebook URL', 'myplace-cleans' ),
		'social_instagram' => __( 'Instagram URL', 'myplace-cleans' ),
		'social_twitter'   => __( 'X / Twitter URL', 'myplace-cleans' ),
		'social_linkedin'  => __( 'LinkedIn URL', 'myplace-cleans' ),
		'social_tiktok'    => __( 'TikTok URL', 'myplace-cleans' ),
		'social_youtube'   => __( 'YouTube URL', 'myplace-cleans' ),
	);
	foreach ( $social_fields as $key => $label ) {
		$wp_customize->add_setting( 'myplace_' . $key, array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( 'myplace_' . $key, array(
			'label'   => $label,
			'section' => 'myplace_social',
			'type'    => 'url',
		) );
	}
}
add_action( 'customize_register', 'myplace_customize_register' );

/**
 * Output Customizer colors as CSS variable overrides in <head>.
 */
function myplace_customizer_css() {
	$brand = myplace_opt( 'brand_color' );
	$deep  = myplace_opt( 'slate_deep' );
	$bg    = myplace_opt( 'slate_bg' );
	$ink   = myplace_opt( 'ink_color' );
	?>
	<style id="myplace-customizer-vars">
		:root{
			--brand: <?php echo esc_html( $brand ); ?>;
			--slate-deep: <?php echo esc_html( $deep ); ?>;
			--slate-bg: <?php echo esc_html( $bg ); ?>;
			--ink: <?php echo esc_html( $ink ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'myplace_customizer_css', 20 );

/**
 * Social icons map (inline SVG, currentColor).
 */
function myplace_social_icon( $name ) {
	$icons = array(
		'facebook'  => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 22v-8h3l1-4h-4V7.5c0-1.1.3-1.9 2-1.9h2V2.1C16.7 2 15.7 2 14.7 2 11.9 2 10 3.7 10 6.9V10H7v4h3v8h3z"/></svg>',
		'instagram' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>',
		'twitter'   => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2H21.5l-7.5 8.57L23 22h-6.81l-5.34-6.98L4.8 22H1.54l8.04-9.19L1 2h6.95l4.82 6.37L18.244 2zm-1.193 18h1.88L7.05 4H5.04l12.01 16z"/></svg>',
		'linkedin'  => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.22 8h4.56v14H.22V8zM8 8h4.37v1.92h.06c.61-1.15 2.1-2.36 4.32-2.36 4.62 0 5.47 3.04 5.47 7v7.44h-4.55v-6.6c0-1.57-.03-3.6-2.2-3.6-2.2 0-2.54 1.72-2.54 3.49V22H8V8z"/></svg>',
		'tiktok'    => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M21 8.5a7.5 7.5 0 0 1-4.5-1.5v8a6 6 0 1 1-6-6c.3 0 .7 0 1 .1v3.1a3 3 0 1 0 2 2.8V2h3a4.5 4.5 0 0 0 4.5 4.5v2z"/></svg>',
		'youtube'   => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M23 7.5a4 4 0 0 0-2.8-2.8C18.2 4 12 4 12 4s-6.2 0-8.2.7A4 4 0 0 0 1 7.5 42 42 0 0 0 .3 12 42 42 0 0 0 1 16.5a4 4 0 0 0 2.8 2.8C5.8 20 12 20 12 20s6.2 0 8.2-.7a4 4 0 0 0 2.8-2.8c.5-1.4.7-4.5.7-4.5s-.2-3.1-.7-4.5zM10 15.5v-7l6 3.5-6 3.5z"/></svg>',
	);
	return isset( $icons[ $name ] ) ? $icons[ $name ] : '';
}

/**
 * Render the social links bar (used in footer / anywhere).
 */
function myplace_social_links( $args = array() ) {
	$args = wp_parse_args( $args, array(
		'class'      => 'social-links',
		'aria_label' => __( 'Social links', 'myplace-cleans' ),
	) );

	$networks = array( 'facebook', 'instagram', 'twitter', 'linkedin', 'tiktok', 'youtube' );
	$links    = array();
	foreach ( $networks as $net ) {
		$url = myplace_opt( 'social_' . $net );
		if ( ! empty( $url ) ) {
			$links[ $net ] = $url;
		}
	}
	if ( empty( $links ) ) {
		return;
	}
	?>
	<ul class="<?php echo esc_attr( $args['class'] ); ?>" aria-label="<?php echo esc_attr( $args['aria_label'] ); ?>">
		<?php foreach ( $links as $net => $url ) : ?>
			<li>
				<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( ucfirst( $net ) ); ?>">
					<?php echo myplace_social_icon( $net ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php
}

/**
 * Live preview JS (site title/description only — colors refresh).
 */
function myplace_customize_preview_js() {
	wp_enqueue_script(
		'myplace-customizer-preview',
		get_template_directory_uri() . '/assets/js/customizer-preview.js',
		array( 'customize-preview', 'jquery' ),
		MYPLACE_VERSION,
		true
	);
}
add_action( 'customize_preview_init', 'myplace_customize_preview_js' );
