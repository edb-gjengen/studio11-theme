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
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/studio.css" />
<?php /*<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/scripts/jquery.lightbox-0.5.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/frontbox/fbox_conf.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/frontbox/fbox_engine-min.js"></script>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/frontbox/fbox.css" type="text/css" />
*/

?>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/jquery.simplemodal-1.4.1.js"></script>
<?php
if(1 || is_front_page()): ?>
<script type="text/javascript">

var $j = jQuery.noConflict();
function showUrlModal(href)
{
	$j.get(href, function(html)
	{
		var top = $j(window).scrollTop()  + "px !important";
		$j.modal($j("#content", html).html(),
				{
					onOpen: function (dialog) {
						dialog.overlay.fadeIn('fast', function () {
							dialog.data.hide();
							dialog.container.fadeIn('fast', function () {
								dialog.data.slideDown('fast');
							});
						});
						FB.XFBML.parse();

					},
					onClose: function (dialog) {
					
						setLocationWithoutScrolling(preModal);
						dialog.data.slideUp('fast', function () {
								dialog.overlay.slideUp('fast', function () {
									dialog.container.fadeOut('fast', function () {
											$j.modal.close();
									});
								});
						});
					}
				});
		$j("#simplemodal-container").css('top', top);
		
	});

}

function setLocationWithoutScrolling(location)
{
	var from = $j("body").scrollTop();
	if(!from) from = $j("html").scrollTop();
	
	if(location.indexOf("#") == -1) location += "#";

	window.location = location;
	$j("body,html").scrollTop(from);
}

var preModal = window.location.href + "#"
if(preModal.indexOf("#") == -1) preModal = preModal.substr(0, preModal.indexOf("#"));

$j(function()
		{
		
		tmp = window.location.href.match(/#(\/.+)/);

		if(tmp != null)
		{
			showUrlModal(window.location.origin + tmp[1]);
		}
	
	var modal_match = Array(/^<?php echo preg_quote(home_url(),'/') ?>\/.+/);
	
	var modal_not_match = Array(/wp-admin/);
	
$j(".content .post,#header [href],.event-table tr").live('click',function(e)
	{
		preModal = window.location.href;
				e.preventDefault();
				
		if($j(this).attr('href'))
			href = this.href;
		else
			href = $j(this).find("[href]").attr('href');
		
		if(!href)
			return;
		
		for(var i = 0; i < modal_match.length; i++)
			if(href.match(modal_match[i]))
				break;
		if(i == modal_match.length)	return;
		
		for(var i = 0; i < modal_not_match.length; i++)
			if(href.match(modal_not_match[i]))
				return;
		
		showUrlModal(href);

		href = href.substr(<?php echo strlen(home_url()) ?>);
		window.location = window.location.href.split("#")[0] + "#" + href;
	});
	$j("#simplemodal-overlay").live('click', function(){
		$j.modal.close();
	
	});
});
</script>
<?php endif; ?>
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
					
						<div id="countdown" style="position:absolute;top:10px;left:400px;color:#C32083;">Bare <?php echo ceil((strtotime('2011-08-15') - time()) / 60 / 60 / 24) ?> dager igjen!</div>
						
						<img style="position:absolute;left:460px;bottom:-5px;" src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/bjornenmskilt.png" alt="STUDiO11" usemap="#blifrivillig" />
						<map name="blifrivillig">  
        <area shape="poly" coords="1,144,15,46,50,50,41,66,49,87,61,51,29,39,49,0,111,20,97,64,67,55,52,99,62,124,53,149,31,149," href="/bli-med" alt="Bli frivillig!" title="Bli frivillig!"   />
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
