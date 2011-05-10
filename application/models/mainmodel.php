<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MainModel extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_all_patients($offset, $num_per_page) {
		$this->db->select('patients.id as id, patients.token as token, lists.name as list, vcs.name as vcs');
		$this->db->from('patients');
		$this->db->join('lists', 'patients.list = lists.id', 'inner');
		$this->db->join('vcs', 'lists.vc = vcs.id', 'inner');
		$this->db->order_by('patients.id');
		$this->db->limit($num_per_page, $offset);
		$rs = $this->db->get();
		$table = array();
		if ($rs->num_rows() > 0) {
			foreach ($rs->result_array() as $row) {
				$table[$row['id']] = array('token' => $row['token'], 'list' => $row['list'], 'vcs' => $row['vcs']);
			}
		}
		return array('total' => 11, 'pats' => $table);
	}

}

