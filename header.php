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
						if(FB)
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
	
$j(".content .post,#header [href],.event-table tr,.widget_artist_widget p").live('click',function(e)
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
	
	$j(".content .navigation a").live('click', function(e)
	{	
		e.preventDefault();
		p = this.parentNode;
		while(p != null && (!p.className || p.className.indexOf("content") == -1))
			p = p.parentNode;
		/*
		durl = $("a[href^=\"<?php echo home_url()?>/category/\"]",p).attr('href');
		durl += this.href.substr((window.location.origin + window.location.pathname).length);
		*/
		/*
		$.get(this.href, function(html){
			nev = '<div class="scroller" style="float:left;">' + $("#" + p.id, html).html() + '</div>';
			
			first = $('' + $(p).html() + '</div>')
			$(p).html(first);
			
			if(this.parentNode.className == 'nav-previous')
				
			
			first.css('position','absolute');
			first.animate({left:800},500);
			
			
		});
		*/
		
		
		
		$j.get(this.href, function(html){
			$j(p).html($j("#" + p.id, html).html());
		});
		
	});
});
var p;

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
<?php require 'studio_header.php'; ?>
<div id="wrapper" class="hfeed">
	<div id="main">
