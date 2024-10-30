<?php
/*
Plugin Name: Moody
Plugin URI: http://www.gudlyf.com/index.php?p=365
Description: Adds a "Current Mood" icon to each post after the date.  Borrowed icons from http://www.wholenotherthing.com/ which can be grabbed from http://www.gudlyf.com/media/moods.zip.  Unzip moods into wp-content/plugins/moods and activate plugin.  Add Custom field "mood" to posts to use one of the icons (posts with no mood show a default icon).
Version: 1.1
Author: Keith McDuffee
Author URI: http://www.gudlyf.com/
*/


function moody($original) {

	$mood_icon_dir = $curpath . "/wp-content/plugins/moods/";
	$mood_icon_ext = '.gif';

	$values = get_post_custom_values('mood');
	$mood = $values[0];

	/* Print original text first */
	print $original;

	if(!empty($mood)) {

		print '&nbsp;&nbsp;';
		print '(Current Mood: ';
		print '<img src="' . get_settings('siteurl') . $mood_icon_dir . $mood . $mood_icon_ext . '" alt="' . $mood . '" title="' . $mood . '" />)';
	}	
}

add_filter('the_time', 'moody');

?>
