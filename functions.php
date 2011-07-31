<?php

function studio11_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Left column', 'Studio11' ),
		'id' => 'left-column',
		'description' => __( 'The left column in the layout', 'studio11' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Right column', 'studio11'),
		'id'=>'right-column',
		'description' => __( 'The right column in the layout', 'studio11' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',));

}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'studio11_widgets_init' );



class Program_Widget extends WP_Widget {
  
  function Program_Widget() { parent::WP_Widget(false, 'Program'); }
  function form($instance) {}
  function update($new_instance, $old_instance) { return $new_instance; }
 
  function widget($args, $instance) {
    global $post, $wp_locale;
    $args['title'] = 'Program';
    $events = new WP_Query( array('post_type' => 'event','posts_per_page' => -1,'meta_key' => 'neuf_events_starttime','orderby' => 'meta_value','order' => 'ASC') );
    echo $args['before_widget'] . $args['before_title'] . $args['title'] . $args['after_title'];
    if ( $events->have_posts() ) {
      echo '<ul id="event-widget">';
      while ( $events->have_posts() ) {
	$events->the_post();
	echo '<li>' . date("d/m", get_post_meta($post->ID, 'neuf_events_starttime', true)) . ' |  <a href="' . get_permalink() . '">' . get_the_title() . '</a>';
      } echo '</ul>';
      wp_reset_query();
    } echo $args['after_widget'];
  }
}

class Artist_Widget extends WP_Widget {
  function Artist_Widget() { parent::WP_Widget(false, 'Artister'); }
  function form($instance) {}
  function update($new_instance, $old_instance) { return $new_instance; }
  
  function widget($args, $instance) {
    global $post, $wp_locale;
    $args['title'] = 'Artister';
    $studart = new WP_Query( array('post_type' => 'artist', 'posts_per_page' => -1, 'orderby' => 'rand'));
    echo $args['before_widget'] . $args['before_title'] . $args['title'] . $args['after_title'];
    if ( $studart->have_posts() ) {
      while ( $studart->have_posts() ) {
	$studart->the_post();

    // event-lenka
	$event = get_post_meta($post->ID, 'studio_artist_event', true);
    // ekstern lenke for artisten
    if (get_post_meta($post->ID, 'studio_artist_link', true))
        $link = ' <a href="'.get_post_meta($post->ID, 'studio_artist_link', true).'">ekst</a>';
    else $link = "";	
    echo '<p class="'.get_post_meta($post->ID, 'studio_artist_font', true).'"><a href="' . $event . '">' . get_the_title() . '</a>'.$link.'</p>';

      } 
    } echo $args['after_widget'];
  }
}

register_widget('Program_Widget'); 
register_widget('Artist_Widget'); 
add_filter('widget_text', 'do_shortcode');


function get_related_artists( $post_id) 
{
	$related = get_posts( array(
				'connected_from' => $post_id,
				'nopaging' => true,
				'post_type' => 'artist',
				'suppress_filters' => false
			));
	
	if ( empty( $related ))
		return array();
	
	return $related;
}

function get_related_events( $post_id) 
{
	$related = get_posts( array(
				'connected_to' => $post_id,
				'nopaging' => true,
				'post_type' => 'event',
				'suppress_filters' => false
			));
	
	if ( empty( $related ))
		return array();
	
	return $related;
}

function artist_content_events( $content )
{
	global $post;
	if(is_single())
	{
	
		if($post->post_type == 'artist')
		{
			$events = get_related_events($post->ID);
		
			$content .= '<ul class="artist-list">';
		
			foreach($events as $event)
			{
				$content .=  '<li>';
				$content .=  '<a href="' . get_permalink( $event->ID ) . '">';
				$content .=  get_the_post_thumbnail($event->ID, array(32,32), array('style'=>'float:left;')); 
				$content .=  '<span class="event_title">' . $event->post_title . '</span>';
				$content .=  '</a>';
				$content .=  '</li>';
			}
		
			$content .=  '</ul>';
		}
		else if($post->post_type == 'event')
		{
			$artists = get_related_artists($post->ID);

			$content .=   '<ul class="artist-list">';
			foreach($artists as $artist)
			{
				$content .= '<li>';
				$content .= '<a href="' . get_permalink( $artist->ID ) . '">';
				$content .= get_the_post_thumbnail($artist->ID, array(32,32), array('style'=>'float:left;')); 
				$content .= '<span class="event_title">' . $artist->post_title . '</span>';
				$content .= '</a>';
				$content .= '</li>';
			}
			$content .= '</ul>';
		}
	}
	return $content;
}

if(function_exists('get_related_events'))
	add_filter( 'the_content', 'artist_content_events' );
/*
function thumbnail_in_header($title)
{
	global $post;

	if ( is_single() && 
			current_theme_supports( 'post-thumbnails' ) &&
							has_post_thumbnail( $post->ID ) &&
							($image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= 550 ) 
						$title = '<img src="'. get_the_post_thumbnail( $post->ID ) . '" />' . $title;
	return $title;
}

add_filter('the_title', 'thumbnail_in_header');*/

function menu_links($items, $args)
{
	foreach($items as &$item)
		if(in_array($item->object, array('page','post','category')))
			$item->url = home_url() . '/#' . strtolower(preg_replace('#[^\w]+#','',$item->title));
	return $items;
}

add_filter('wp_nav_menu_objects', 'menu_links');



// create custom plugin settings menu
add_action('admin_menu', 'studio_create_menu');



function studio_create_menu() {

	//create new top-level menu
	add_menu_page('Studio theme settings', 'Studio theme settings', 'administrator', 'studio_lol_settings', 'studio_settings_page',plugins_url('/images/icon.png', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'register_studio_settings' );
}


function register_studio_settings() {
	//register our settings
	register_setting( 'studio-settings', 'front_menu_id' );
}

function studio_settings_page() {
?>
<div class="wrap">
<h2>Studio theme</h2>

<form method="post" action="options.php">
    <?php 
    settings_fields( 'studio-settings' ); ?>
    <?php //do_settings( 'baw-settings-group' ); ?>
   
   <?php
   
$menus = wp_get_nav_menus( );
   
   ?>
<select name="front_menu_id">

<?php foreach($menus as $menu): ?>
	<label for="front_menu_id">Hvilken meny skal fremsiden hentes fra?</label><option value="<?php echo $menu->term_id ?>" <?php if($menu->term_id == get_option('front_menu_id')) echo ' selected="selected"'?> ><?php echo $menu->name ?></option>
<?php endforeach; ?>
</select>
<p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
</form>
</div>
<?php } 


