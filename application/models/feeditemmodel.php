<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class FeedItemModel extends CI_Model {
	private $_id = false;
	public $feed_id;
	public $remote_id;
	public $link;
	public $title;
	public $text;
	public $created_time;
	public $updated_time;

	function __construct() {
		parent::__construct();
	}

	public function reset() {
		$this->_id = false;
		$this->feed_id = 0;
		$this->remote_id = '';
		$this->link = '';
		$this->title = '';
		$this->text = '';
		$this->created_time = localtime();
		$this->updated_time = localtime();
	}

	public function load($feed_id, $remote_id) {
		$rs = $this->db->query('SELECT * FROM items WHERE feed_id = ? AND remote_id = ?', array($feed_id, $remote_id));
		if ($rs->num_rows() > 0) {
			$row = $rs->row_array();
			$this->_id = $row['id'];
			$this->feed_id = $feed_id;
			$this->remote_id = $remote_id;
			$this->link = $row['link'];
			$this->title = $row['title'];
			$this->text = $row['text'];
			$this->created_time = strtotime($row['created_time']);
			$this->updated_time = strtotime($row['updated_time']);
			return true;
		} else {
			$this->reset();
			$this->feed_id = $feed_id;
			$this->remote_id = $remote_id;
			return false;
		}
	}

	public function save() {
		if ($this->_id !== false) {
			$this->db->query('UPDATE items SET link = ?, title = ?, text = ?, updated_time = NOW() WHERE id = ?', array($this->link, $this->title, $this->text, $this->_id));
		} else {
			$this->db->query('INSERT INTO items(feed_id, remote_id, link, title, text, created_time, updated_time) VALUES (?, ?, ?, ?, ?, NOW(), NOW())', array($this->feed_id, $this->remote_id, $this->link, $this->title, $this->text));
			$this->_id = $this->db->insert_id();
		}
	}

	function get_items($offset, $num_per_page) {
		$rs = $this->db->query('SELECT COUNT(*) AS total FROM items');
		if ($rs->num_rows() > 0) {
			$row = $rs->row_array();
			$total = $row['total'];
			$rs = $this->db->query('SELECT * FROM items ORDER BY updated_time DESC LIMIT ? OFFSET ?', array($num_per_page, $offset));
			return array('total' => $total, 'items' => $rs->result_array());
		} else {
			return array('total' => 0, 'items' => array());
		}
	}
}
