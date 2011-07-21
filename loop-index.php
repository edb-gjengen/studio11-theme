<h1>Nyheter</h1>
<?php
global $post, $wp_locale;

$news = new WP_Query( array('post_type' => 'post',
			    'posts_per_page' => 10,
			    'order' => 'DESC'
			    ));

if ($news->have_posts()) : while ($news->have_posts()) : $news->the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
  
<h2><a href="#"><span class="frontbox" src="#hidpos-<?php the_ID(); ?>" height="420" title="<?php the_title(); ?>"></span><?php the_title(); ?></a><a href="<?php the_permalink(); ?>" rel="bookmark" ></a></h2>
  <p class="meta">Posted on <?php the_time('F jS, Y'); ?></p>
<div id="hidpos-<?php the_ID(); ?>" style="display:none"><?php the_content(); ?></div>
  
  <p><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', '); ?> | <?php edit_post_link('Edit', '', ' | '); ?> <?php comments_popup_link('No Comments &#187;', '1 Com &#187;', '% Comments &#187;'); ?></p>
</div>
<?php endwhile; ?>
<?php next_posts_link('&laquo; Older Entries') ?>
<?php previous_posts_link('Newer Entries &raquo;') ?>
<?php else : ?>

<h2>No Posts Found</h2>
<?php endif;  ?>

<hr />

<h1>Program</h1>

<?php
  $events = new WP_Query( array(
				'post_type' => 'event',
				'posts_per_page' => -1,
				'meta_key' => 'neuf_events_starttime',
				'orderby' => 'meta_value',
				'order' => 'ASC'
				) );

if ($events->have_posts()) : while ($events->have_posts()) : $events->the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
  
<h2>
<a href="#"><span class="frontbox" src="#hidpos-<?php the_ID(); ?>" height="420" title="<?php the_title(); ?>"></span><?php the_title(); ?></a></h2>
<p class="meta">Posted on <?php the_time('F jS, Y'); ?></p>
<div id="hidpos-<?php the_ID(); ?>" style="display:none"><?php the_content(); ?></div>
  
  <p><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', '); ?> | <?php edit_post_link('Edit', '', ' | '); ?> <?php comments_popup_link('No Comments &#187;', '1 Com &#187;', '% Comments &#187;'); ?></p>
</div>
<?php endwhile; ?>
<?php next_posts_link('&laquo; Older Entries') ?>
<?php previous_posts_link('Newer Entries &raquo;') ?>
<?php else : ?>

<h2>No Events Found</h2>
<?php endif; ?>

