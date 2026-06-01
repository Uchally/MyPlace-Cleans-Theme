<?php
/**
 * Front page — composes the homepage from self-contained section partials.
 *
 * Each section mirrors a React component from the original app:
 *   Hero.tsx          → template-parts/sections/hero-section.php
 *   Domestic.tsx      → template-parts/sections/domestic-section.php
 *   Commercial.tsx    → template-parts/sections/commercial-section.php
 *   Airbnb.tsx        → template-parts/sections/airbnb-section.php
 *   Testimonials.tsx  → template-parts/sections/testimonials-section.php
 *   Contact.tsx       → template-parts/sections/contact-section.php
 *
 * @package MyPlaceCleans
 */

get_header();

get_template_part( 'template-parts/sections/hero-section' );
get_template_part( 'template-parts/sections/domestic-section' );
get_template_part( 'template-parts/sections/commercial-section' );
get_template_part( 'template-parts/sections/airbnb-section' );
get_template_part( 'template-parts/sections/testimonials-section' );
get_template_part( 'template-parts/sections/contact-section' );

get_footer();
