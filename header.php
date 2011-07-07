<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="header" style="position:relative;">
		<div id="masthead">
			<div id="branding" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title" style="width:100%;margin:0px;float:none;">
					<span>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						
						<?php //bloginfo( 'name' ); ?>
						<img style="position:absolute;left:10px;top:10px;" height="120"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/STUDiO_logo_gra.png" alt="STUDiO11" />
						<img style="position:absolute;left:180px;top:55px;" height="100"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/Kvalen.png" alt="STUDiO11" />
						<img style="position:absolute;left:230px;bottom:0px;" width="150"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/Slangen.png" alt="STUDiO11" />
						
						<img style="position:absolute;left:400px;bottom:0px;" width="50"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/Pingvinen.png" alt="STUDiO11" />
						<img style="position:absolute;left:150px;bottom:0px;" width="50"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/Ugla.png" alt="STUDiO11" />
						<img style="position:absolute;left:0px;bottom:0px;" width="75"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/Kua.png" alt="STUDiO11" />
					
						<div id="countdown" style="position:absolute;top:-20px;right:0px;">Bare 52 dager igjen!</div>
						
						<img style="position:absolute;left:460px;bottom:-5px;" height="200"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/bjornenmskilt.png" alt="STUDiO11" usemap="#blifrivillig" />
						<map id="blifrivillig" name="blifrivillig">
<area shape="poly" coords="1,193,5,123,24,65,68,68,54,87,67,121,85,70,42,51,66,1,149,27,129,84,92,72,69,131,84,167,74,198,"  href="/blifrivillig" alt="Bli frivillig" title="Bli frivillig"   />
</map>

	<img style="position:absolute;left:550px;bottom:0px;" width="40"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/Grisen.png" alt="STUDiO11" />
						</a>
						

					</span>
				</<?php echo $heading_tag; ?>
			</div><!-- #branding -->

			<div id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</div><!-- #access -->
		</div><!-- #masthead -->
		</div><!-- #header -->
</div><!-- skjønner ikke hvorfor denne trengs -->
<div id="wrapper" class="hfeed">
	<div id="main">