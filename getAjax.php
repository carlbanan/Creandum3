<?php

$url = $_GET['url'];
 
// Remove domain name
$url = str_replace(
    'http://'.$_SERVER['HTTP_HOST'],
    '',
    $url
);
 
$_SERVER['REQUEST_URI'] = $url;

require_once($_SERVER['DOCUMENT_ROOT'].'/wp/wp-load.php');
wp(); // Load Wordpress


ob_start(); // Start buffer
header("HTTP/1.1 200 OK");  

$c = get_category_by_slug( $url );
$extra = the_slug();

if(is_category($url)){
    $extra = "thisiscateg";
}

if(is_home()){
	$template = "index-content";
}
else{
	the_post();
	$slug = $post->post_type;
	$retId = the_ID();
	global $post;	   

    if($slug == 'post'){
    	$template = 'single';	
    }
    elseif($_GET['cat']){
    	$template = 'category';
    }        	
}

locate_template(
    array($template."-content.php", 'index-content.php'),
    true
);

if(is_category()){
    $slug = "category"; 
}

$page_template = ob_get_contents(); // Put buffer contents into variable
ob_end_clean(); // Stop buffer

echo json_encode(array(
    'pagehtml' => "extra ".$extra." slug: ".$_SERVER['REQUEST_URI']." ".$page_template,
));


function the_slug(){
      $slug = basename(get_permalink());
      do_action('before_slug', $slug);
      $slug = apply_filters('slug_filter', $slug);
      do_action('after_slug', $slug);
      return $slug;
}

?>