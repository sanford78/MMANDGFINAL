<?php
/**
 * @package simplegmaps
 * @version 1.0.1
**/

/*
Plugin Name: Simple Google Static Map
Plugin URI: http://www.equisele.com/proyectos/wordpress-plugin-development/google-static-map-for-wordpress/
Description: This simple plugin allow you to put a simple static google map with a simple shortcode. A few parameters to setup and you've got it! Use this example in your content area or widget area: [sgmap w="300" h="300" z="14" addr="Granada,Spain"] ONCE you activate the plugin
Author: &Aacute;ngel C. Yd&aacute;&ntilde;ez
Version: 1.0.1
Author URI: http://equisele.com/
*/

function googlemaps_function ($atts, $content = null) {
	extract(shortcode_atts(array(
		"w"    => "480",
		"h"    => "480",
		"z"    => "14",
		"col"  => "blue",
		"addr" => "Granada,Spain",
		"link" => "false",
		"divclass" => "sgmap"
		), $atts));
	$src = "http://maps.google.com/maps/api/staticmap?center=" . urlencode($addr) . "&amp;size=" . $w . "x" . $h . "&amp;zoom=" . $z . "&amp;markers=color:" . $col . "|" . urlencode($addr) . "|label:m&amp;maptype=roadmap&amp;sensor=false";
	$map = "<img alt=\"" . $addr . "\" src=\"" . $src . "\" />";
	if ($link == "false") {
		$link = false;
	}
	if ((bool)$link) {
		$url = "http://maps.google.com/maps?q=" . urlencode($addr);
		$map = "<a href=\"" . $url . "\">" . $map . "</a>";
	}
	if (strlen($divclass) > 0) {
		$map = "<div class=\"" . $divclass . "\">" . $map . "</div>";
	}
	return $map;
}

add_shortcode("sgmap", "googlemaps_function");

add_filter( 'widget_text', 'do_shortcode');

?>