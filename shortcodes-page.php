<?php

	function WPTime_perso_slider_shortocodes() {
		add_menu_page( 'Perso Slider Shortcodes', 'Perso Slider', 'update_core', 'WPTime_perso_slider_shortocodes', 'WPTime_perso_slider_shortocodes_page');
	}
	add_action( 'admin_menu', 'WPTime_perso_slider_shortocodes' );
		
	function WPTime_perso_slider_shortocodes_page(){ // shortcodes page function
		
		?>
			<div class="wrap">
				<h2>Perso Slider Shortcodes</h2>
            	<form>
                	<table class="form-table">
                		<tbody>
 
                    		<tr>
                        		<th scope="row"><label>Usage</label></th>
                            	<td>
                                    <textarea id="description" rows="5" cols="30" style="width:839px; height:1097px; white-space:nowrap;">
### Shortcodes

1. Usage:
[persoslider_w]
[persoslider_c url=""]
[/persoslider_w]



### [persoslider_w] Attributes

1. auto="" enter "true" to activate auto slider, example: auto="true" default is false (not required).
2. time="" enter value for auto slider time (seconds) example for 6 seconds: time="6" default is 3 seconds (not required).
3. move="" enter animation effect for auto slider, Right or Left effect, example: move="Left" default is Right (not required).
4. width="enter custom width size, numbers only, example: 400" (not required).
5. height="enter custom height size, numbers only, example: 400" (not required).
6. margin_bottom="enter custom margin bottom size, numbers only, example: 15" (not required).



### [persoslider_c] Attributes

1. url="here add image link, or youtube video, or vimeo video, or keek video, or instagram image" (required).
2. before_img="here add link for your image, example add your post link or any link or leave blank" (not required).
3. cap="your text caption" (not required).
4. before_cap="here add link for your caption, example add your post link or any link or leave blank" (not required).
Note: don't worry about your old posts, img="" and video="" attributes is working, do no need to update your old posts :)



### Example for standard slider

[persoslider_w]
[persoslider_c url="http://wp-time.com/wp-content/uploads/2015/02/insu.jpg" cap="My Car"]
[persoslider_c url="http://www.youtube.com/watch?v=21It5oDzYZw"]
[persoslider_c url="http://wp-time.com/wp-content/uploads/2014/11/tea_cups_splash-wallpaper-1920x1080.jpg"]
[persoslider_c url="http://vimeo.com/106835400"]
[persoslider_c url="https://instagram.com/p/yDHGouyl5k/"]
[persoslider_c url="https://www.keek.com/keek/ASU8dab"]
[/persoslider_w]
	


### Example for autoplay

[persoslider_w auto="true" time="5" move="Left"]
[persoslider_c url="http://wp-time.com/wp-content/uploads/2015/02/insu.jpg" cap="My Car"]
[persoslider_c url="http://www.youtube.com/watch?v=21It5oDzYZw"]
[persoslider_c url="http://wp-time.com/wp-content/uploads/2014/11/tea_cups_splash-wallpaper-1920x1080.jpg"]
[persoslider_c url="http://vimeo.com/106835400"]
[persoslider_c url="https://instagram.com/p/yDHGouyl5k/"]
[persoslider_c url="https://www.keek.com/keek/ASU8dab"]
[/persoslider_w]



enjoy.
									</textarea>
								</td>
                        	</tr>
                            
                    	</tbody>
                    </table>
                </form>
            	<div class="tool-box">
					<h3 class="title">Beautiful WordPress Themes</h3>
					<p>Get collection of 87 WordPress themes for only $69, a lot of features and free support! <a href="http://j.mp/et_ref_wptimeplugins" title="Get it now!" target="_blank">Get it now</a>.</p>
					<p>See also <a href="http://j.mp/cm_ref_wptimeplugins" title="CreativeMarket - WordPress themes" target="_blank">CreativeMarket</a> and <a href="http://j.mp/tf_ref_wptimeplugins" title="Themeforest - WordPress themes" target="_blank">Themeforest</a>.</p>
					<p><a href="http://j.mp/et_ref_wptimeplugins" title="Get collection of 87 WordPress themes for only $69" target="_blank"><img src="http://www.elegantthemes.com/affiliates/banners/570x100.jpg"></a></p>
				</div>
            </div>
        <?php
	} // shortcodes page function
	
?>