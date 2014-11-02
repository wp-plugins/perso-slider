<?php
/*
Plugin Name: Perso Slider
Plugin URI: http://qass.im/my-plugins/
Description: Responsive and Retina images and videos slider, simple but flexible with touch devices support and compatible with Google Chrome, FireFox, Opera, Safari, IE9, IE10, IE11.
Version: 1.0.0
Author: Qassim Hassan
Author URI: http://qass.im
License: GPLv2 or later
*/

/*  Copyright 2014  Qassim Hassan  (email : qassim.pay@gmail.com)

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


// Include javascript and style
function perso_slider__js_css(){		
	wp_enqueue_style( 'perso-slider-style', plugins_url( '/css/perso-slider-style.css', __FILE__ ), false, null);
	wp_enqueue_script( 'perso-slider-script', plugins_url( '/js/perso-slider-script.js', __FILE__ ), array('jquery'), null, false);
}
add_action('wp_enqueue_scripts', 'perso_slider__js_css');


// Add perso slider shortcode
function perso_slider_( $atts, $content = null ) { 
	$clean_content = strip_tags($content);
    return '<div class="perso_slider_wrap">
    	<div class="perso_slider_content">
    		<ul id="perso_slider" class="perso_slider_list">'.do_shortcode($clean_content).'</ul>
            <i class="perso_slider_next"></i>
            <i class="perso_slider_prev"></i>
    	</div>
    </div>';
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