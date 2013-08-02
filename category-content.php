	<?php
		//$c = get_category($_GET['cat']);
		if(is_category()){
			$c = get_query_var('cat');
			dump_var($c);
			echo "cat";
		}
	?>

	<!-- section -->
	<section role="main">

		<h1><?php _e( 'Categories for ', 'html5blank' ); echo $c->name; ?></h1>
		
		<!-- SET THE CURRENT CATEGORY FOR THE LOOP -->
		<?php query_posts('category_name='.$c->name); ?>

		<?php get_template_part('loop'); ?>
		
		<?php get_template_part('pagination'); ?>
	
	</section>
	<!-- /section -->