<?php
/*
Template Name: Studio frontpage
*/

global $post, $wp_locale;

$items =  wp_get_nav_menu_items('5');

function onlyPagePost($item)
{
	return $item->object == 'page' || $item->object == 'post';
}

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
			$query = array('cat'=>$item->object_id);
			break;
		default:
			$query = false;
	}
	
	if($query)
	{
		echo "<a id=\"item-$item->ID\"></a>";
		if($pre) echo $pre;
		query_posts($query);
		get_template_part( 'loop', $loop);
	}
}

?>
<script type="text/javascript">
$j(function()
{
	var $ = $j;
	$j("#right-menu a").click(function(e){
		li = this.parentNode;
		
		id = this.parentNode.className.match(/menu-item-(\d+)/)[1];
		
		e.preventDefault();
		href = this.href;
		items = $j("#item-" + id);
		
		var targetOffset = items.offset().top - 30;
		$j("html,body").animate({scrollTop: targetOffset}, 'fast');

	});

});

</script>

