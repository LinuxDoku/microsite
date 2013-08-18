<?php
/**
 * Plugin Name: microsite
 * Plugin URI: http://github.com/LinuxDoku/microsite
 * Description: Manage multiple microsites within one wordpress instance. Each can have a very own layout which can be selected when creating a new page.
 * Version: 0.1
 * Author: Martin Lantzsch
 * Author URI: http://linux-doku.de
 * 
 * @copyright (c) 2013, Martin Lantzsch <martin@linux-doku.de>
 */

add_action('init', 'microsite_bootstrap');
add_action('pre_get_posts', 'microsite_pre_get_posts');
add_action('add_meta_boxes', 'microsite_add_meta_boxes');
add_action('save_post', 'microsite_save_post');

define('MICROSITE_PATH', realpath(ABSPATH . '/wp-content/microsites/'));

function microsite_bootstrap() {
	// check if microsite dir exists, if not create
	if(!file_exists(MICROSITE_PATH))
		mkdir(MICROSITE_PATH);
}

function microsite_pre_get_posts($query) {
	if($query->is_page) {
		$microsite = get_post_meta(get_query_var('page_id'), 'microsite', true);
		if($microsite != null && $microsite != 'none') {
			// to clear all variables put in own function
			function run($microsite) {
				$path = MICROSITE_PATH . '/' . $microsite . '/index.php';
				if(file_exists($path)) {
					include $path;
					exit;
				}
			};
			run($microsite);
		}
	}
}

function microsite_add_meta_boxes() {
	add_meta_box(
		'microsite-select',
		__('Microsite', 'microsite_textdomain'),
		'microsite_meta_select_box_inner',
		'page',
		'normal'
	);
}

function microsite_meta_select_box_inner() {
	global $post;
	$microsites = scandir(MICROSITE_PATH);
	$microsites = array_slice($microsites, 2);
	$selectedMicrosite = @get_post_meta($post->ID, 'microsite', true);
	include dirname(__FILE__) . '/templates/meta-select-box-inner.php';
}

function microsite_save_post($post_id) {
	if($_REQUEST['post_type'] !== 'page')
		return false;
	
	if(!current_user_can('edit_page', $post_id))
		return false;
	
	$microsite = sanitize_text_field($_POST['microsite']);
	update_post_meta($post_id, 'microsite', $microsite);
}