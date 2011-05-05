<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Feed extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function view() {
		$this->load->library('simplepie');
		$this->simplepie->cache_location = APPPATH . 'cache';
		$this->simplepie->set_feed_url('http://codeigniter.com/feeds/atom/full/');
		$this->simplepie->init();
		$this->load->view('feed/view', array('items' => $this->simplepie->get_items()));
	}
}
