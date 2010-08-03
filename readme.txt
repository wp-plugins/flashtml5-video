=== Plugin Name ===
Contributors: hookstudios
Tags: html5, flash, video, mobile, fallback
Requires at least: 2.0.2
Tested up to: 3.0.1
Stable tag: 1.0

A Wordpress implementation of the FlasHTML5 Video Javascript Library.

== Description ==

A Wordpress implementation of the FlasHTML5 Video Javascript Library.  Simply use the following short codes [FlasHTML5][/FlasHTML5], paste in the main parameters from the library function, and the plugin will do the rest. Also, do not forget to add the .htaccess file to the directory with your videos. An example of the plugin in action and associated code can be viewed <a href="http://labs.byhook.com">here</a>. (All you really need to do is copy the code from the demo page, update the file names, change the sizes, and you will be good to go. 


== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_action('plugin_name_hook'); ?>` in your templates

== Frequently Asked Questions ==

= How do I use this plugin? =

Simply use the following short codes [FlasHTML5][/FlasHTML5], paste in the main parameters from the library function, and the plugin will do the rest. An example of the plugin in action and associated code can be viewed <a href="http://labs.byhook.com">here</a>. (All you really need to do is copy the code from the demo page, update the file names, change the sizes, and you will be good to go. 

= Where can I learn move about the Javascript Library? =

Visit <a href="http://labs.byhook.com">Hook Labs</a> for more information

= I have all the code correct, but my browser can't find the videos? =

Don't forget to add the .htaccess file to the directory with your videos.

== Changelog ==

= 1.0 =
* Initial Release

== Upgrade Notice ==

= 1.0 =
Upgrade notices describe the reason a user should upgrade.  No more than 300 characters.

== A brief Markdown Example ==

[FlasHTML5]
useFlashFirst:false,
mobileVideoObject: new HTML5VideoObject(480,192, {"autobuffer":"autobuffer","controls":"controls"}),
mobileH264: new HTML5VideoAsset("http://labs.byhook.com/html5video/telematics_mobile.mp4","video/mp4"),
mobilePosterImage: new HTML5VideoImage("http://labs.byhook.com/html5video/telematics_mobile.jpg", 480, 192, "telematics", "No video playback capabilities."),
androidPosterImage: new HTML5VideoImage("http://labs.byhook.com/html5video/telematics_mobile_play.jpg", 480, 192),
desktopVideoObject: new HTML5VideoObject(980, 390, {"autobuffer":"autobuffer","controls":"controls"}),
desktopH264: new HTML5VideoAsset("http://labs.byhook.com/html5video/telematics_desktop.mp4","video/mp4"),
desktopAdditionalVideos: [new HTML5VideoAsset("http://labs.byhook.com/html5video/telematics_desktop.ogv","video/ogg"), new HTML5VideoAsset("http://labs.byhook.com/html5video/telematics_desktop.webm","video/webm")],
desktopFlashObject: new HTML5VideoFlashObject("http://labs.byhook.com/html5video/player.swf", 980, 414, {"allowFullScreen":"true", "flashvars":"file=http://labs.byhook.com/html5video/telematics_desktop.flv&image=http://labs.byhook.com/html5video/telematics_desktop.jpg"}),
desktopPosterImage: new HTML5VideoImage("http://labs.byhook.com/html5video/telematics_desktop.jpg", 980, 390, "telematics", "No video playback capabilities.")
[/FlasHTML5]

`<?php code(); // goes in backticks ?>`