<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class FeedModel extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_feed_update_urls() {
		$rs = $this->db->query('SELECT id, feed_url FROM feeds');
		$feeds = array();
		if ($rs->num_rows() > 0) {
			foreach ($rs->result_array() as $row) {
				$feed[$row['id']] = $row['feed_url'];
			}
		}
		return $feed;
	}
}
