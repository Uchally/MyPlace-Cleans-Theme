<?php
/**
 * Single post template.
 *
 * @package MyPlaceCleans
 */

get_header();

while ( have_posts() ) :
	the_post(); ?>

	<section class="page-hero">
		<div class="container-mp">
			<span class="eyebrow"><?php echo esc_html( get_the_date() ); ?></span>
			<h1><?php the_title(); ?></h1>
			<p class="text-mute"><?php the_excerpt(); ?></p>
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
				<?php the_content(); ?>
			</div>

			<footer class="mt-8 text-mute" style="font-size:.85rem;">
				<?php
				$cats = get_the_category_list( ', ' );
				if ( $cats ) {
					printf( '<p>%s %s</p>', esc_html__( 'Filed under:', 'myplace-cleans' ), $cats );
				}
				?>
			</footer>

			<?php
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			?>
		</div>
	</article>

<?php endwhile;

get_footer();
