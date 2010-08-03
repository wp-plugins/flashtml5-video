<?php
/*
Plugin Name: FlasHTML5 Video
Plugin URI: http://labs.byhook.com/
Description: Flash / HTML 5 Video with Mobile Fallback
Author: Hook
Version: 1.0.0
Author URI: http://www.byhook.com/


This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function add_flashtml5_header() {
	$plpath = WP_PLUGIN_URL .'/flashtml5-video';
	echo <<<END
<script type="text/javascript" src="$plpath/FlasHTML5Video.js"></script>
<script type="text/javascript" src="$plpath/AC_OETags.js"></script>
END;
}
add_action('wp_head','add_flashtml5_header');


function myFlasHTML5( $atts, $content = null ) {
   $content = str_replace("<br />", "", $content);
   $content = str_replace("<p>", "", $content);
   $content = str_replace("</p>", "", $content);
   $content = str_replace("&#8220;", "\"", $content);
   $content = str_replace("&#8221;", "\"", $content);
   $content = str_replace("&#8243;", "\"", $content);
   $content = str_replace("&#038;", "&", $content);
   return '<script type="text/javascript">
				var video = new HTML5Video();
				video.init({' . $content . '});
				video.detect();
	</script>';
}

add_shortcode("FlasHTML5", "myFlasHTML5");

add_action('admin_menu', 'flashtml5_menu');

function flashtml5_menu() {

  add_options_page('FlasHTML5 Video Options', 'FlasHTML5 Video', 'manage_options', 'my-unique-identifier', 'flashtml5_options');

}

function flashtml5_options() {

  if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }

echo '<br /><br /><strong>Useage</strong><br />';
echo 'Simply use the following short codes, paste in the main parameters from the library function, and the plugin will do the rest.  Also, do not forget to add the .htaccess file to the directory with your videos. Visit <a href="http://labs.byhook.com">Hook Labs</a> for more information.  An example of the plugin in action and associated code can be viewed <a href="http://labs.byhook.com">here</a>. <em>(All you really need to do is copy the code from the demo page, update the file names, change the sizes, and you will be good to go.<br /></em>';
echo '<br />';
echo '<strong>Shortcodes</strong><br />';
echo '[FlasHTML5][/FlasHTML5]<br />';
echo '<br />';
echo '<strong>Parameters</strong><br />';
echo 'Most of the parameters should be pretty self-explanatory. However, there are a few objects that are used that need to be understood.<br />';
echo '<br />';
echo '/*<br />';
echo 'This object represents the actual video tag in HTML5.<br />';
echo '@param width------Integer of the width of the video.<br />';
echo '@param height-----Integer of the height of the video.<br />';
echo '@param params-----Object of parameters that can be used on the video tag. Examples are:<br />';
echo '--autoplay--------autoplay----If present, then the video will start playing as soon as it is ready<br />';
echo '--controls--------controls----If present, controls will be displayed, such as a play button.<br />';
echo '--loop------------loop--------If present, the video will start over again, every time it is finished.<br />';
echo '--preload---------preload-----If present, the video will be loaded at page load, and ready to run. Ignored if "autoplay" is present.<br />';
echo '--src-------------url---------The URL of the video to play<br />';
echo '*/<br />';
echo '<em>new HTML5VideoObject(480,192, {"autobuffer":"autobuffer","controls":"controls"});</em><br />';
echo '<br />';
echo '/*<br />';
echo 'This object represents the different sources for the HTML5 video object.<br />';
echo '@param src----Source path to the video.<br />';
echo '@param type---Type of video. Examples:<br />';
echo '	video/mp4<br />';
echo '	video/ogg<br />';
echo '	video/webm<br />';
echo '*/<br />';
echo '<em>new HTML5VideoAsset("telematics_mobile.mp4","video/mp4");</em><br />';
echo ' <br />';
echo '/*<br />';
echo 'This object represents the fallback image and the poster image for the video.<br />';
echo '@param src--------Source path to the image.<br />';
echo '@param width------Integer of the width of the video.<br />';
echo '@param height-----Integer of the height of the video.<br />';
echo '@param alt--------Alt tag to the image<br />';
echo '@param title------Title for the image<br />';
echo '*/<br />';
echo '<em>new HTML5VideoImage("telematics_mobile.jpg", 480, 192, "telematics", "No video playback capabilities.");</em><br />';
echo '<br />';
echo '/*<br />';
echo 'This object represents the flash object implementation.<br />';
echo '@param src------------Source path to the swf to load.<br />';
echo '@param width----------Integer of the width of the flash.<br />';
echo '@param height---------Integer of the height of the flash.<br />';
echo '@param params---------Object of parameters that can be used on the flash implementation. Examples are:<br />';
echo '--flashvars-----------Flash vars passed to the flash module: Example: "file=telematics_desktop.flv&amp;image=telematics_desktop.jpg"<br />';
echo '--allowFullScreen-----If present, controls will be displayed, such as a play button.<br />';
echo '--wmode---------------Window mode<br />';
echo '--bgcolor-------------Background color<br />';
echo '--allowscriptaccess---Whether to allow script access.<br />';
echo '--See more:-----------<a href="http://kb2.adobe.com/cps/127/tn_12701.html">http://kb2.adobe.com/cps/127/tn_12701.html</a><br />';
echo '/*<br />';
echo "<em>new HTML5VideoFlashObject(&#8220player.swf&#8220, 980, 414, {&#8220allowFullScreen&#8220:&#8220true&#8220, echo '&#8220flashvars&#8220:&#8220file=telematics_desktop.flv&amp;image=telematics_desktop.jpg&#8220});</em><br />";
echo '<br />';
echo '<strong>API Options</strong><br />';
echo '/*<br />';
echo 'outputElementId-----------The string id of the HTML element to inject the code into. This method is used when the code is placed into the body of the page. Optionally, leaving this option out and placing the script tag inside the <body/> will output the code directly into that location. Note: <b>This only works using the "onload" method of implementation.</b><br />';
echo 'useFlashFirst-------------This is an optional boolean value for flash lovers that will use flash before using HTML5 as a fallback. Defaults to false (do not tell my flash coworkers). Also, this option requires the adobe detection kit js file.<br />';
echo 'mobileVideoObject---------A video object for mobile users (ipod, iphone, ipad, ios, blackberry, android). Allows a different sized video than desktop users.<br />';
echo 'mobileH264----------------The video asset to use by default.<br />';
echo 'mobilePosterImage---------The default poster image to use for all mobile devices (Android is different, see androidPosterImage below)<br />';
echo 'androidPosterImage--------Android phones do not currently overlay a play button on top of the video and require a slightly different implementation, for that reason, we allow a separate image for android phones with a play button in the poster image itself.<br />';
echo 'desktopVideoObject--------The video object that specifies the size of the video for desktop users.<br />';
echo 'desktopH264---------------The default h264 video for desktop users.<br />';
echo 'desktopAdditionalVideos---Some browsers support different video formats. You can add additional ones and browsers will process from top-to-bottom until a compatible video is found.<br />';
echo 'desktopFlashObject--------The flash object to embed for the flash fallback.<br />';
echo 'desktopPosterImage--------The desktop poster image and fallback image in case a incompatible browser without flash is found.<br />';
echo '*/<br /><br /><br /><br /><br /><br />';


}

?>