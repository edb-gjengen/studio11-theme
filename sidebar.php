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
		<?php dynamic_sidebar( 'right-column' ) ?>
			</ul>
		</div>
		<div id="float_stopper"></div>
