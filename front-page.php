<?php

get_header(); ?>
		<style type="text/css">
		#container
		{
			background-color:transparent;
			padding:0px;
		}
		
		.content
		{
			margin-bottom:50px;
			background-color:#12b259;
			background-color:rgba(18,178,89,0.8);
			padding:10px;
		}
		
		</style>
		<div id="container">
			<div id="content" role="main">
<?php
$items =  wp_get_nav_menu_items('5');

foreach($items as $item)
{
	wp_reset_postdata();
	
	$pre = '';
	switch($item->object)
	{
		case 'page':
			$loop = 'page';
			$query = array('page_id'=>$item->object_id);
			break;
		case 'post':
			$loop = 'post';
			$query = array('p'=>$item->object_id);
			break;
		case 'category':
			$cat = get_category($item->object_id);
			$pre = '<h1>' . $cat->name . '</h1>';
			
			$loop = 'category';
			$query = array('cat'=>$item->object_id,'posts_per_page'=>5);
			if($wp->query_vars['paged'])
				$query['paged'] = $wp->query_vars['paged'];
			break;
		default:
			$query = false;
	}
	
	if($query)
	{
		$id = strtolower(preg_replace('#[^\w]+#', '', $item->title));
		echo "<div class=\"content\"  id=\"{$id}\">";
		if($pre) echo $pre;
		query_posts($query);
		get_template_part( 'loop', $loop);
		
		echo '</div>';
	}
}

?>
<script type="text/javascript">
$j(function()
{
	var $ = $j;
	$j("#right-menu a").click(function(e){
		if(this.href.match(/^<?php echo preg_quote(home_url(),'/') ?>\/#/))
		{
			e.preventDefault();
		
			id="#" + $(this).text().replace(/[^\w]/g, "").toLowerCase();
		
			items = $j(id);
		
			var from = $j("body").scrollTop();
			if(!from) from = $j("html").scrollTop();
			window.location = this.href;
			$j("body,html").scrollTop(from);
		
			var targetOffset = items.offset().top - 30;
			$j("html,body").animate({scrollTop:targetOffset}, 500);
		}
	});
	
	$(".content .navigation a").live('click', function(e)
	{	
		e.preventDefault();
		p = this.parentNode;
		while(p != null && p.className != "content")
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
		
		
		
		$.get(this.href, function(html){
			$(p).html($("#" + p.id, html).html());
		});
		
	});

});

</script>
			</div><!-- #content -->
		</div><!-- #container -->
		
<?php get_sidebar(); ?>
<?php get_footer(); ?>
