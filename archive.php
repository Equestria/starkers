<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts() 
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) );
if ( have_posts() ):
	if ( is_day() ) : $date = get_the_date( 'D M Y' );
	elseif ( is_month() ) : $date = get_the_date( 'M Y' );
	elseif ( is_year() ) : $date = get_the_date( 'Y' );
?>
<h2><?php if ($date) {
	printf(__('Archive: %s','starkers'),$date);
} else {
	_e('Archive','starkers');
}?></h2>
<ol>
<?php while ( have_posts() ) : the_post(); ?>
	<li>
		<article>
			<h2><a href="<?php esc_url( the_permalink() ); ?>" title="<?php printf(__('Permalink to %','starkers'),get_the_title()); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
			<?php the_content(); ?>
		</article>
	</li>
<?php endwhile; ?>
</ol>
<?php else: ?>
<h2><?php _e('No posts to display','starkers'); ?></h2>	
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>