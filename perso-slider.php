<?php
/*
Plugin Name: Perso Slider
Plugin URI: http://wp-time.com/perso-slider/
Description: Beautiful images and videos slider, responsive and retina, autoplay, touch devices, youtube, vimeo, keek, instagram support, compatible with all major browsers.
Version: 1.92
Author: Qassim Hassan
Author URI: http://qass.im
License: GPLv2 or later
*/

/*  Copyright 2015 Qassim Hassan (email: qassim.pay@gmail.com)

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


// Include shortcodes page
include(plugin_dir_path(__FILE__).'/shortcodes-page.php');


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
				"width" 	=> 	"",
				"height" 	=> 	"",
				"margin_bottom"  =>  "",
				"auto" 		=> 	"false",
				"time" 		=> 	"3",
				"move" 		=> 	"Right"
			),$atts
		)
	);
	
	if( !empty($width) and !empty($margin_bottom) ){
		$wrap_style = ' style="max-width:'.$width.'px; margin-bottom:'.$margin_bottom.'px;"';
	}elseif( !empty($width) and empty($margin_bottom) ){
		$wrap_style = ' style="max-width:'.$width.'px;"';
	}elseif( empty($width) and !empty($margin_bottom) ){
		$wrap_style = ' style="margin-bottom:'.$margin_bottom.'px;"';
	}else{
		$wrap_style = null;
	}
	
	if( !empty($height) ){
		$height_style = ' style="height:'.$height.'px;padding-bottom:0;"';
	}else{
		$height_style = null;
	}
	
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
    	<div id="<?php echo $id; ?>" class="perso_slider_wrap"<?php echo $wrap_style; ?>>
    		<div class="perso_slider_content"<?php echo $height_style; ?>>
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
				"url"			=>	"",
				"img"			=>	"",
				"before_img"	=>	"",
				"cap"			=>	"",
				"before_cap"	=>	"",
				"video"			=>	""
			),$atts
		)
	);
	
	$the_list 		= 	null;
	$img_before_o 	= 	null;
	$img_before_c 	= 	null;
	$the_cap 		= 	null;
	
	if( !empty($url) or !empty($img) or !empty($video) ){
		if( !empty($img) ){
			$url = $img;
		}
		
		if( !empty($video) ){
			$url = $video;
		}
		
		if( preg_match("/(vimeo)+/", $url) ){
			$protocol = array('http://', 'https://', 'www.', 'vimeo.com', '/');
			$video_link = str_replace($protocol, '', $url);
			$the_list = '<iframe src="http://player.vimeo.com/video/'.$video_link.'"></iframe>';
		}
		
		elseif( preg_match("/(youtube)+/", $url) or preg_match("/(youtu.be)+/", $url) ){
			$protocol = array('http://', 'https://', 'www.', 'youtube.com', 'youtu.be', 'embed', 'watch?v=', '/');
			$video_link = str_replace($protocol, '', $url);
			$the_list = '<iframe src="http://youtube.com/embed/'.$video_link.'"></iframe>';
		}
		
		elseif( preg_match("/(keek.com)+/", $url) ){
			$regex = array("/.*\\/(?=[^\\/]*\\/)|\\//m");
			$preg_replace = preg_replace($regex, "", $url);
			$str_replace = str_replace("keek", "", $preg_replace);
			$embed_link = "https://www.keek.com/keek/$str_replace/embed?autoplay=0&mute=0&controls=1&loop=0";
			$the_list = '<iframe src="'.$embed_link.'"></iframe>';
		}
		
		elseif( preg_match("/(instagram.com)|(instagr.am)+/", $url) ){
			$instagram_api	= wp_remote_get("http://api.instagram.com/oembed?url=$url");
			$retrieve = wp_remote_retrieve_body( $instagram_api );
			$response = json_decode($retrieve);
			if( preg_match('/(No Media Match)|(No URL Match)+/', $retrieve) ){
				return false;
			}else{
				$the_list = '<img src="'.$response->thumbnail_url.'">';
			}
		}
		
		else{
			$img = $url;
			$the_list = '<img src="'.$img.'">';
			
			if( !empty($before_img) ){
				$img_before_o = '<a href="'.$before_img.'">';
				$img_before_c = '</a>';
			}else{
				$img_before_o = null;
				$img_before_c = null;
			}
			
			if( !empty($cap) ){
				$the_cap = '<p class="perso_slider_caption">'.$cap.'</p>';
			}elseif( !empty($before_cap) and !empty($cap) ){
				$the_cap = '<p class="perso_slider_caption"><a href="'.$before_cap.'">'.$cap.'</a></p>';
			}else{
				$the_cap = null;
			}
		}
		
		$result = $img_before_o.$the_list.$img_before_c.$the_cap;
		return '<li>'.$result.'</li>';
	}
	
}
add_shortcode("persoslider_c", "perso_slider__content");

?>