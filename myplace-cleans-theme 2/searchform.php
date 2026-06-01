<?php
/**
 * Search form.
 *
 * @package MyPlaceCleans
 */
?>
<form role="search" method="get" class="search-form card-surface" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="display:flex;gap:.5rem;">
	<label class="screen-reader-text" for="s"><?php esc_html_e( 'Search for:', 'myplace-cleans' ); ?></label>
	<input type="search" id="s" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Search…', 'myplace-cleans' ); ?>" style="flex:1;background:transparent;border:0;color:var(--ink);outline:none;font:inherit;" />
	<button type="submit" class="btn-primary"><?php esc_html_e( 'Search', 'myplace-cleans' ); ?></button>
</form>
