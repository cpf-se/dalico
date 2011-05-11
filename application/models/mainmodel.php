<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MainModel extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_all_patients($offset, $num_per_page) {
		$total = $this->db->get('patients')->num_rows();

		if ($total > 0) {
			$this->db->select('patients.id as id, patients.token as token, lists.name as list, vcs.name as vcs, dalby1.datum as datum, dalby1.pdf as pdf');
			$this->db->from('patients');
			$this->db->join('lists', 'patients.list = lists.id', 'inner');
			$this->db->join('vcs', 'lists.vc = vcs.id', 'inner');
			$this->db->join('dalby1', 'patients.id = dalby1.patient', 'inner');
			$this->db->order_by('dalby1.datum', 'desc');
			$this->db->order_by('dalby1.tid', 'desc');
			$this->db->limit($num_per_page, $offset);
			$rs = $this->db->get();
			$table = array();
			if ($rs->num_rows() > 0) {
				foreach ($rs->result_array() as $row) {
					$table[$row['id']] = array('token' => $row['token'], 'list' => $row['list'], 'vcs' => $row['vcs'], 'datum' => $row['datum'],
						'pdf' => $row['pdf']);
				}
			}
			return array('total' => $total, 'pats' => $table);
		} else {
			return array('total' => 0, 'pats' => array());
		}
	}
}

