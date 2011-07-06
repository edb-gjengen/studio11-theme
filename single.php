<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
echo '<pre style="background-color:white;">';
var_dump($_SERVER,$_POST, $_GET);
die;
get_header(); ?>

		<div id="container">
			<div id="content" role="main">
<?php echo get_the_post_thumbnail( $post->ID, array(550,500) ); ?>
			<?php
			/* Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			 
			get_template_part( 'loop', 'single' );
			?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
