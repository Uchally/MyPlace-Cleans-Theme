<?php
/**
 * Main index template — used as fallback for any view without a dedicated template.
 * Renders the blog/post archive.
 *
 * @package MyPlaceCleans
 */

get_header(); ?>

<section class="page-hero">
	<div class="container-mp">
		<span class="eyebrow"><?php esc_html_e( 'Latest from the blog', 'myplace-cleans' ); ?></span>
		<h1><?php single_post_title( '', false ) ?: bloginfo( 'name' ); ?></h1>
		<p><?php bloginfo( 'description' ); ?></p>
	</div>
</section>

<section class="section">
	<div class="container-mp">

		<?php if ( have_posts() ) : ?>
			<div class="grid-3">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'card' ); ?>
				<?php endwhile; ?>
			</div>

			<nav class="mt-8" aria-label="<?php esc_attr_e( 'Posts navigation', 'myplace-cleans' ); ?>">
				<?php
				the_posts_pagination( array(
					'mid_size'  => 1,
					'prev_text' => __( '« Previous', 'myplace-cleans' ),
					'next_text' => __( 'Next »', 'myplace-cleans' ),
				) );
				?>
			</nav>

		<?php else : ?>
			<div class="card-surface">
				<h2><?php esc_html_e( 'Nothing here yet.', 'myplace-cleans' ); ?></h2>
				<p class="text-mute"><?php esc_html_e( 'Check back soon for cleaning tips and updates.', 'myplace-cleans' ); ?></p>
			</div>
		<?php endif; ?>

	</div>
</section>

<?php get_footer();
