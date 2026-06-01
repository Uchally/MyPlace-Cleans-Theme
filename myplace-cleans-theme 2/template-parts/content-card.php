<?php
/**
 * Post card used in archives and the homepage.
 *
 * @package MyPlaceCleans
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'card-surface post-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="post-card__thumb" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'medium_large' ); ?>
		</a>
	<?php endif; ?>

	<div>
		<div class="post-card__meta"><?php echo esc_html( get_the_date() ); ?></div>
		<h3 class="post-card__title mt-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="text-mute" style="font-size:.9rem;"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
		<a class="text-brand" href="<?php the_permalink(); ?>" style="font-size:.85rem;font-weight:600;"><?php esc_html_e( 'Read more →', 'myplace-cleans' ); ?></a>
	</div>
</article>
