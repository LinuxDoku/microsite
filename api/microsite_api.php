<?php
require 'microsite_api_meta.php';

class microsite_api {
	public $post_id;
	public $meta;
	
	public function __construct() {
		$this->post_id = get_queried_object_id();
		$this->meta = new microsite_api_meta($this);
	}
}