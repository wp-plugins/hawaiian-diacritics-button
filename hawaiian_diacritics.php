<?php
/*
Plugin Name: Hawaiian Diacritics
Plugin URI: http://ehawaii.gov
Description: Easy insertion of Hawaiian Diacriticals in TinyMCE.
Author: HIC
Version: 1.0.2
Author URI: http://ehawaii.gov
*/

/*  Copyright 2015 HIC (email: hicwp@ehawaii.gov)

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


/******************** CHANGELOG ********************

v1.0.0 -- 20130207
--
Initial release.

v1.0.1 -- 20130207
--
Testing Update service.

v1.0.2 -- 20130227
--
Fixed error in IE browsers.

******************** CHANGELOG END *********************/

/******************** PLUGIN FUNCTIONS BEGIN ********************/

/**********************************************************************/
/* tinyMCE Button Functions
/**********************************************************************/

function hawaiian_diacritics_button() {
	if (! current_user_can('edit_posts') && ! current_user_can('edit_pages'))
		return;
	if (get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "add_hawaiian_diacritics_button");
		add_filter('mce_buttons', 'register_hawaiian_diacritics_button');
	}
}

function register_hawaiian_diacritics_button($buttons) {
	array_push($buttons, "|", "hdb");
	return $buttons;
} 

function add_hawaiian_diacritics_button($plugin_array) {
	$plugin_array['hdb'] = plugins_url('/tinyMCE_button/button.js', __FILE__);
	return $plugin_array;
}

add_action('init', 'hawaiian_diacritics_button');
?>