<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
 
 
 ?>

		<div id="left-column">
			<ul class="xoxo">
		<?php dynamic_sidebar( 'left-column' ) ?>
			</ul>
		</div>
		
		<div id="right-column">
			<ul class="xoxo">
				<li id="right-menu">
				
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img style="position:absolute;left:40px;top:-80px;border:0px;" height="100"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/strutsen.png" alt="STUDiO11" />
						<?php //bloginfo( 'name' ); ?>
						<img style="float:none;border:0px;" width="150"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/STUDiO_logo_gra.png" alt="STUDiO11" />
						
						</a>
						
				<?php wp_nav_menu( array( 'container_class' => 'menu-sidebar', 'theme_location' => 'primary' ) ); ?>
			
				</li>
		<?php dynamic_sidebar( 'right-column' ) ?>
			</ul>
		</div>
		<div id="float_stopper"></div>
