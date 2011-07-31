<?php $first = true; ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php if ($first) { $post_class_stuff = 'first'; $first = false; } else { $post_class_stuff = "" ; } ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $post_class_stuff ); ?>>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="loop-image">
				<?php echo get_the_post_thumbnail( $post->ID, array (525, 9999) ); ?>
			</div>

			<div class="entry-meta">
				<?php twentyten_posted_on(); ?>
			</div><!-- .entry-meta -->

			<div class="entry-content">

						<?php the_excerpt(); ?>

			</div><!-- .entry-content -->

		</div><!-- #post-## -->
<?php endwhile; ?>
