<?php
   /*
   Plugin Name: Dispaly end text
   Description: Display Thankyou text at end of each post
   Author: Preeti Bhosale
   License: GPL2
   */

	function endMessage_add_post_content($content) {
	if (is_single()) {
		$content .= '</br>Thankyou for visiting our website.';
	}
	return $content;
}

add_filter ('the_content', 'endMessage_add_post_content', 0);
?>