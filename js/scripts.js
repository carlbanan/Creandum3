var serv = "http://localhost/wp/adidas/";

// DOM Ready
$(function() {
	
	// SVG fallback
	// toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script#update
	if (!Modernizr.svg) {
		var imgs = document.getElementsByTagName('img');
		var dotSVG = /.*\.svg$/;
		for (var i = 0; i != imgs.length; ++i) {
			if(imgs[i].src.match(dotSVG)) {
				imgs[i].src = imgs[i].src.slice(0, -3) + "png";
			}
		}
	}

	ajaxify();

	// AJAX NAVIGATION
	function ajaxify(){
		
		// Only run on internal async links
		
		$('.async,.nav a').unbind("click");	
		console.log("now bind ajax");
		
		$('.async,.nav a').click(function(e) {
		    e.preventDefault();
		    linkUrl = $(this).attr('href');
		    cat = $(this).attr("cat");
		    if(cat != ''){
		    	div = 'wrapper-index';
		    }
		    $.ajax({
		        url: serv+'wp-content/themes/html5blank-master/getAjax.php',
		        data: { url: linkUrl ,cat : cat},
		        dataType: 'json', 
		        success: function(data) {
		            $('.main').html(data.pagehtml);

					History.pushState(
					    {state:1}, // output to console.log
					    "State 1", // internal name
					    linkUrl // url
					);

					// axaxify new content
					ajaxify();
		            
		        }     
		    });
		});
	}

});