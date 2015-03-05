=== Perso Slider ===
Contributors: Qassim.Dev
Donate link: http://j.mp/plugins_donation
Tags: slider, images slider responsive, images slider, auto, autoplay slider, autoplay, image, images, retina, video, video slider, videos, youtube, vimeo, responsive, shortcode, Post, plugin, posts, page, widget, admin, sidebar, google, twitter, comments
Requires at least: 2.6
Tested up to: 4.1.1
Stable tag: 1.0.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Description: Responsive and Retina images and videos slider, autoplay support, touch devices support, youtube and vimeo support, compatible with browsers.

== Description ==

### Perso Slider                                                

Description: Responsive and Retina images and videos slider, autoplay support, touch devices support, youtube and vimeo support, compatible with all major browsers.

### The Features

* Fully Responsive.
* Retina Ready.
* Unlimited amount of images and videos to be added to the slider. 
* Unlimited Sliders.
* Autoplay Support (will be stopped when hover).
* YouTube and Vimeo support.
* Images Captions.
* Touch devices support.
* Compatible with any lightbox.
* Compatible with Google Chrome, FireFox, Opera, Safari, IE9, IE10, IE11.
* Easy to use and without options page, 2 shortcodes only.

### Live Demo

* [http://wp-time.com/perso-slider/](http://wp-time.com/perso-slider/)

### Rate The Plugin

* [Please rate Perso Slider plugin](https://wordpress.org/support/view/plugin-reviews/perso-slider#postform)

### Download Davinci WordPress Blog Theme

* [Responsive and Retina WordPress blog Theme with a lot of features](http://wp-time.com/a-premium-wordpress-blog-themes/)

### Beautiful WordPress Themes

* [Collection of 87 themes for only $69](http://j.mp/beautiful_themes)

### My Premium WordPress Themes And Plugins

* [My premium themes and plugins on Creative Market.](http://j.mp/1AS73zL)
* [My premium themes and plugins on Themeforest.](http://j.mp/Perso_themes)

### About

* [The plugin designed and developed by Qassim Hassan.](http://qass.im)
* [Qassim Hassan on Twitter.](https://twitter.com/Qassim_Dev)
* [Banner and icon designed by iFlendra, thanks to him.](https://twitter.com/iFlendra)

### More Plugins

* [My Plugins](https://profiles.wordpress.org/qassimdev/#content-plugins)

== Installation ==

### Installation

1. Upload 'perso-slider' folder to the '/wp-content/plugins/' directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

### Shortcodes

1. Use perso slider shortcodes: [persoslider_w][persoslider_c img="" before_img="" cap="" before_cap="" video=""][/persoslider_w]
2. This shortcode is slider wrap [persoslider_w] [/persoslider_w]
3. This shortcode is your content [persoslider_c] put it inside slider wrap shortcode.

### [persoslider_w] Attributes (autoplay attributes)
1. auto="" enter "true" to activate auto slider, example: auto="true" default is false.
2. time="" enter value for auto slider time (seconds) example for 6 seconds: time="6" default is 3 seconds.
3. move="" enter animation effect for auto slider, Right or Left effect, example: move="Left" default is Right.

### [persoslider_c] Attributes

1. img="here add your image link only"
2. before_img="here add link for your image, example add your post link or any link or leave blank"
3. cap="your text caption"
4. before_cap="here add link for your caption, example add your post link or any link or leave blank"
5. To add video, use this attribute only without another attributes: video="here add your video link, youtube or vimeo only"

### Example for standard slider

    [persoslider_w]
    [persoslider_c img="http://wp-time.com/wp-content/uploads/2015/02/insu.jpg" cap="My Car"]
    [persoslider_c video="http://www.youtube.com/watch?v=21It5oDzYZw"]
    [persoslider_c img="http://wp-time.com/wp-content/uploads/2014/11/tea_cups_splash-wallpaper-1920x1080.jpg"]
    [persoslider_c video="http://vimeo.com/106835400"]
    [/persoslider_w]
	
### Example for autoplay

    [persoslider_w auto="true" time="5" move="Left"]
    [persoslider_c img="http://wp-time.com/wp-content/uploads/2015/02/insu.jpg" cap="My Car"]
    [persoslider_c video="http://www.youtube.com/watch?v=21It5oDzYZw"]
    [persoslider_c img="http://wp-time.com/wp-content/uploads/2014/11/tea_cups_splash-wallpaper-1920x1080.jpg"]
    [persoslider_c video="http://vimeo.com/106835400"]
    [/persoslider_w]

== Frequently Asked Questions ==

### FAQ

1. Question is: I added video attribute with cap attribute, but why not working? Answere is: video with caption is not allowed, cap attribute working only with img attribute.

* [For more questions or help, contact me.](http://qass.im/contact)
* [Or ask me on twitter.](https://twitter.com/Qassim_Dev)

== Changelog ==

= 1.0.5 =
Fix the problem in autoplay.

= 1.0.4 =
Autoplay Support.

= 1.0.3 =
Animation time fixed.

= 1.0.2 =
Wrap margin fixed.
Wrap width fixed.
Media query for big screen size added.

= 1.0.1 =
Fix before and after for li tag.

= 1.0.0 =
First version.