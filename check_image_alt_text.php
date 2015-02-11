<?php
/*
Plugin Name: Check for missing Image Alt Text
Plugin URI: http://ehawaii.gov
Description: Check for missing alternative text on uploaded images.
Author: HIC
Version: 1.0.0
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

v1.0.0 -- 20150106
--
Initial release.

******************** CHANGELOG END *********************/


/******************** PLUGIN FUNCTIONS BEGIN ********************/
add_action('admin_menu', 'check_image_alt_text_menu');

function check_image_alt_text_menu() {
	add_options_page( 'Check Image Alt Text', 'Image Alt Text', 'manage_options', 'check_image_alt_text', 'check_image_alt_text_options' );
}

function check_image_alt_text_options() { ?>
	<?php
		$query_images_args = array(
		    'post_type' => 'attachment', 'post_mime_type' =>'image', 'post_status' => 'inherit', 'posts_per_page' => -1,
		);
		$query_images = new WP_Query($query_images_args);
		$images = array();
		foreach ( $query_images->posts as $image) {
			$altText = get_post_meta($image->ID, '_wp_attachment_image_alt', true);
			
			if(strlen($altText) === 0) {
				$imgObj = array(
					'id' => $image->ID,
					'url' => wp_get_attachment_thumb_url($image->ID)
				);
				
				$images[]= $imgObj;
			}
		}
	?>
	<div id="=check_image_alt_text_options" class="wrap">
		<h2>Check Image Alt Text</h2>
		<span>The following images do not have alt text associated with them:</span><br /><br />
		<table class="widefat">
			<thead>
				<tr>
					<th>Image ID</th>
					<th>Thumbnail</th>
					<th>Manage</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($images as $key => $value) : ?>
					<tr <?php echo ($key % 2 === 0 ? 'class="alternate"' : ''); ?>>
						<td><?php echo $value['id']; ?></td>
						<td><img src="<?php echo $value['url']; ?>" alt="thumbnail of <?php echo $value['id']; ?>" /></td>
						<td><a href="<?php echo admin_url(); ?>upload.php?item=<?php echo $value['id']; ?>">Manage</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php } ?>