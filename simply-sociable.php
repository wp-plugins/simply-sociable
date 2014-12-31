<?php
/*
Plugin Name: Simply Sociable
Plugin URI: 
Description: Automatically adds share buttons to the end of each blog post for Google+, Twitter, and Facebook.
Version: 1.0.2
Author: Steve Wozniak
Author URI: http://stephanwozniak.com
License: GPLv2
*/

function simply_sociable_load_js() {
	wp_enqueue_script( 'simply_sociable_load_js', get_bloginfo( 'wpurl' ) . '/wp-content/plugins/simply-sociable/sociable.js' );
}
function simply_sociable_load_css() {
	wp_enqueue_script( 'simply_sociable_load_css', get_bloginfo( 'wpurl' ) . '/wp-content/plugins/simply-sociable/sociable.css' );
}
function simply_sociable($content)
{
	if(is_single() && !is_home()) {
	$content .= '<style type="text/css">.fb_iframe_widget { vertical-align: top !important; margin-left: 16px !important; }</style>';
		$content .= '
			<hr />
			<div class="share-widgets">
			<!-- Place this tag in your head or just before your close body tag -->
			<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
			<!-- Place this tag where you want the +1 button to render -->
			<g:plusone size="medium"></g:plusone>

			<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-related="stephanwozniak">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

			<div class="fb-like" data-href="' . get_permalink( $post->ID ) . '" data-send="true" data-layout="button_count" data-width="120" data-show-faces="false"></div>


			</div>';
	}
	return $content;
}

add_action( 'init', 'simply_sociable_load_js' );
add_action( 'init', 'simply_sociable_load_css' );
add_action( 'the_content' ,'simply_sociable' );

?>