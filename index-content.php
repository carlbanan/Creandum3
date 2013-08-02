	<!-- sectionz -->
	<section role="main" class='main'>
		<?php

			//echo 'http://'.$_SERVER['HTTP_HOST']."/wp/adidas/";
			
		?>
		<h1><?php _e( 'Latest Posts', 'html5blank' ); ?></h1>
	
		<?php get_template_part('loop'); ?>
		
		<?php get_template_part('pagination'); ?>
	
	</section>
	<!-- /section -->