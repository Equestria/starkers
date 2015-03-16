<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) );
if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<article>

	<h2><?php the_title(); ?></h2>
	<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> 
	<?php
	comments_popup_link('Leave a Comment', '1 Comment', '% Comments');
	the_content();
	if ( get_the_author_meta( 'description' ) ) :
		echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
	<h3><?php printf(__('About %s','starkers'), get_the_author()) ; ?></h3>
	<?php
		the_author_meta( 'description' );
	endif;
	comments_template( '', true ); ?>
</article>
<?php endwhile;
Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>