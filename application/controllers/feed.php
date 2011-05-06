<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Feed extends CI_Controller {
	const ITEMS_PER_PAGE = 5;

	function __construct() {
		parent::__construct();
	}

	function view($offset = 0) {
		if (is_numeric($offset)) {
			$offset = floor($offset);
		} else {
			$offset = 0;
		}
		$this->load->model('FeedItemModel');
		$data = $this->FeedItemModel->get_items($offset, Feed::ITEMS_PER_PAGE);
		$data['per_page'] = Feed::ITEMS_PER_PAGE;
		$this->load->view('feed/view', $data);
	}

	function index() {
		$this->view();
	}

	function update_all() {
		$this->load->library('simplepie');
		$this->simplepie->cache_location = APPPATH . 'cache';

		$this->load->model('FeedModel');
		$this->load->model('FeedItemModel');
		$feeds = $this->FeedModel->get_feed_update_urls();
		foreach ($feeds as $feed_id => $feed_url) {
			$this->simplepie->set_feed_url($feed_url);
			$this->simplepie->init();
			$items = $this->simplepie->get_items();
			foreach ($items as $item) {
				$this->FeedItemModel->load($feed_id, md5($item->get_id()));
				$this->FeedItemModel->link = $item->get_permalink();
				$this->FeedItemModel->title = $item->get_title();
				$this->FeedItemModel->text = $item->get_content();
				$this->FeedItemModel->save();
			}
		}
	}
}
