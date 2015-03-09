<?php
/*
Plugin Name: Perso Slider
Plugin URI: http://wp-time.com/perso-slider/
Description: Responsive and Retina images and videos slider, autoplay support, touch devices support, youtube and vimeo support, compatible with all major browsers.
Version: 1.0.6
Author: Qassim Hassan
Author URI: http://qass.im
License: GPLv2 or later
*/

/*  Copyright 2015  Qassim Hassan  (email : qassim.pay@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// WP Time
if( !function_exists('WP_Time') ) {
	function WP_Time() {
		add_menu_page( 'WP Time', 'WP Time', 'update_core', 'WP_Time', 'WP_Time_Page', 'dashicons-admin-links');
		function WP_Time_Page() {
			?>
            	<div class="wrap">
                	<h2>WP Time</h2>
					<div class="tool-box">
                		<h3 class="title">Thanks for using our plugins!</h3>
                    	<p>For more plugins, please visit <a href="http://wp-time.com" title="Our Website" target="_blank">WP Time Website</a> and <a href="https://profiles.wordpress.org/qassimdev/#content-plugins" title="Our profile on WordPress" target="_blank">WP Time profile on WordPress</a>.</p>
                        <p>For contact or support, please visit <a href="http://wp-time.com/contact/" title="Contact us!" target="_blank">WP Time Contact Page</a>.</p>
                        <p>Follow WP Time owner on <a href="https://twitter.com/Qassim_Dev" title="Follow him!" target="_blank">Twitter</a>.</p>
					</div>
					<div class="tool-box">
						<h3 class="title">Beautiful WordPress Themes</h3>
						<p>Get collection of 87 WordPress themes for only $69, a lot of features and free support! <a href="http://j.mp/et_ref_wptimeplugins" title="Get it now!" target="_blank">Get it now</a>.</p>
                        <p>See also <a href="http://j.mp/cm_ref_wptimeplugins" title="CreativeMarket - WordPress themes" target="_blank">CreativeMarket</a> and <a href="http://j.mp/tf_ref_wptimeplugins" title="Themeforest - WordPress themes" target="_blank">Themeforest</a>.</p>
                        <p><a href="http://j.mp/et_ref_wptimeplugins" title="Get collection of 87 WordPress themes for only $69" target="_blank"><img src="http://www.elegantthemes.com/affiliates/banners/570x100.jpg"></a></p>
					</div>
                </div>
			<?php
		}
	}
	add_action( 'admin_menu', 'WP_Time' );
}


// Include javascript and style
function perso_slider__js_css(){		
	wp_enqueue_style( 'perso-slider-style', plugins_url( '/css/perso-slider-style.css', __FILE__ ), false, null);
	wp_enqueue_script( 'perso-slider-script', plugins_url( '/js/perso-slider-script.js', __FILE__ ), array('jquery'), null, false);
}
add_action('wp_enqueue_scripts', 'perso_slider__js_css');


// Add perso slider shortcode
function perso_slider_( $atts, $content = null ) { 
	Extract(
		shortcode_atts(
			array(
				"auto" => "false",
				"time" => "3",
				"move" => "Right"
			),$atts
		)
	);
	
	if( $auto == "true" ){
		$slider_control = null;
		$id = rand().'-autoslider';
	}else{
		$slider_control = '<i class="perso_slider_next"></i><i class="perso_slider_prev"></i>';
		$id = 'perso-slider-standard-slider';
	}
	
	if( $move == "left" or $move == "Left" ){
		$move = "Left";
	}else{
		$move = "Right";
	}
	
	$clean_content = strip_tags($content);
	
	ob_start();
    ?>
    	<div id="<?php echo $id; ?>" class="perso_slider_wrap">
    		<div class="perso_slider_content">
    			<ul id="perso_slider" class="perso_slider_list"><?php echo do_shortcode($clean_content); ?></ul>
				<?php echo $slider_control; ?>
    		</div>
    	</div>
    
    	<?php if($auto == "true") : ?>
			<script type="text/javascript">
				setInterval(function() { 
					if( !jQuery('#<?php echo $id; ?>.perso_slider_wrap').is(':hover') ){
						jQuery('#<?php echo $id; ?>.perso_slider_wrap ul li:first-child')
						.addClass('animated fadeIn<?php echo $move;?>')
						.next().addClass('animated fadeIn<?php echo $move;?>')
						.end()
						.appendTo('#<?php echo $id; ?>.perso_slider_wrap ul');
					}
				}, <?php echo $time; ?>000);
			</script>
        <?php endif; ?>
        
    <?php
	return ob_get_clean();
}
add_shortcode("persoslider_w", "perso_slider_");


// Add content shortcode for persoslider_w shortcode
function perso_slider__content( $atts, $content = null ) { 
	Extract(
		shortcode_atts(
			array(
				"img"=>"",
				"before_img"=>"",
				"cap"=>"",
				"before_cap"=>"",
				"video" => ""
			),$atts
		)
	);
	
	if( !empty($img) and !empty($before_img) and !empty($cap) and !empty($before_cap) ){
		$the_list = '<a href="'.$before_img.'"><img src="'.$img.'"></a><p class="perso_slider_caption"><a href="'.$before_cap.'">'.$cap.'</a></p>';
	}
	
	elseif( !empty($img) and empty($before_img) and empty($cap) and empty($before_cap) ){
		$the_list = '<img src="'.$img.'">';
	}
	
	elseif( !empty($img) and !empty($before_img) and empty($cap) and empty($before_cap) ){
		$the_list = '<a href="'.$before_img.'"><img src="'.$img.'"></a>';
	}
	
	elseif( !empty($img) and !empty($before_img) and !empty($cap) and empty($before_cap) ){
		$the_list = '<a href="'.$before_img.'"><img src="'.$img.'"></a><p class="perso_slider_caption">'.$cap.'</p>';
	}
	
	elseif( !empty($img) and !empty($before_img) and empty($cap) and !empty($before_cap) ){
		$the_list = '<a href="'.$before_img.'"><img src="'.$img.'"></a>';
	}
	
	elseif( !empty($img) and empty($before_img) and !empty($cap) and empty($before_cap) ){
		$the_list = '<img src="'.$img.'"><p class="perso_slider_caption">'.$cap.'</p>';
	}
	
	elseif( !empty($img) and empty($before_img) and !empty($cap) and !empty($before_cap) ){
		$the_list = '<img src="'.$img.'"><p class="perso_slider_caption"><a href="'.$before_cap.'">'.$cap.'</a></p>';
	}
	
	elseif( !empty($img) and empty($before_img) and empty($cap) and !empty($before_cap) ){
		$the_list = '<img src="'.$img.'">';
	}
	
	elseif( preg_match("/(vimeo)+/", $video) ){
		$protocol = array('http://', 'https://', 'www.', 'vimeo.com', '/');
		$video_link = str_replace($protocol, '', $video);
		$the_list = '<iframe src="http://player.vimeo.com/video/'.$video_link.'"></iframe>';
	}
	
	elseif( preg_match("/(youtube)+/", $video) or preg_match("/(youtu.be)+/", $video) ){
		$protocol = array('http://', 'https://', 'www.', 'youtube.com', 'youtu.be', 'embed', 'watch?v=', '/');
		$video_link = str_replace($protocol, '', $video);
		$the_list = '<iframe src="http://youtube.com/embed/'.$video_link.'"></iframe>';
	}
	
	else{
		return false;
	}
	
    return '<li>'.$the_list.'</li>';
}
add_shortcode("persoslider_c", "perso_slider__content");

?>