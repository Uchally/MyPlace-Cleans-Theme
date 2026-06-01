<?php
/**
 * Contact form handler for `myplace_contact` admin-post action.
 *
 * @package MyPlaceCleans
 */
defined( 'ABSPATH' ) || exit;

function myplace_handle_contact() {
	if ( ! isset( $_POST['myplace_contact_nonce'] ) || ! wp_verify_nonce( wp_unslash( $_POST['myplace_contact_nonce'] ), 'myplace_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'error', wp_get_referer() ?: home_url( '/' ) ) );
		exit;
	}

	// Honeypot — silently drop bots.
	if ( ! empty( $_POST['mp_website'] ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'sent', wp_get_referer() ?: home_url( '/' ) ) );
		exit;
	}

	$name    = sanitize_text_field( wp_unslash( $_POST['mp_name']    ?? '' ) );
	$email   = sanitize_email(      wp_unslash( $_POST['mp_email']   ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['mp_phone']   ?? '' ) );
	$service = sanitize_text_field( wp_unslash( $_POST['mp_service'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['mp_message'] ?? '' ) );

	if ( $name && is_email( $email ) ) {
		$to      = function_exists( 'myplace_opt' ) ? myplace_opt( 'email' ) : get_option( 'admin_email' );
		$subject = sprintf( '[%s] New enquiry from %s', get_bloginfo( 'name' ), $name );
		$body    = "Name: $name\nEmail: $email\nPhone: $phone\nService: $service\n\n$message";
		wp_mail( $to, $subject, $body, array( 'Reply-To: ' . $email ) );
	}

	wp_safe_redirect( add_query_arg( 'contact', 'sent', wp_get_referer() ?: home_url( '/' ) ) . '#contact' );
	exit;
}
add_action( 'admin_post_nopriv_myplace_contact', 'myplace_handle_contact' );
add_action( 'admin_post_myplace_contact',        'myplace_handle_contact' );
