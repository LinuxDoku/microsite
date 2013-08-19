<?php
class microsite_api_meta {
	protected $post_id;
	
	public function __construct(microsite_api $api) {
		$this->post_id = $api->post_id;
	}
	
	public function __get($name) {
		return get_post_meta($this->post_id, $name, true);
	}
	
	public function __set($name, $value) {
		update_post_meta($this->post_id, $name, $value);
	}
}