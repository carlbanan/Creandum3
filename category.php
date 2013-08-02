<?php get_header(); ?>

<div id="wrapper-index">	
	<!-- wrapper startpage + category pages -->
	<h1><?php _e( 'Categories for', 'html5blank' ); the_category(); ?></h1>
	<?php get_template_part('category-content'); ?>
</div>

<div id="wrapper-content">	
	<!-- PUT POST AND PAGE CONTENT HERE -->
</div>

<?php get_footer(); ?>