<?php
/**
 * Default page template.
 *
 * @package MyPlaceCleans
 */

get_header();

while ( have_posts() ) :
	the_post(); ?>

	<section class="page-hero">
		<div class="container-mp">
			<span class="eyebrow"><?php bloginfo( 'name' ); ?></span>
			<h1><?php the_title(); ?></h1>
		</div>
	</section>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'section' ); ?>>
		<div class="container-mp">

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="post-card__thumb" style="margin-bottom:2.5rem;">
					<?php the_post_thumbnail( 'large' ); ?>
				</figure>
			<?php endif; ?>

			<div class="entry-content">
				<?php
				the_content();

				wp_link_pages( array(
					'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'myplace-cleans' ) . '">',
					'after'  => '</nav>',
				) );
				?>
			</div>

			<?php
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			?>
		</div>
	</article>

<?php endwhile;

get_footer();
