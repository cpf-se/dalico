<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CRFModel extends CI_Model {
	private $_id = false;

	public $patient;
	public $datum;

	public $length;
	public $weight;
	public $bmi;

	public $waist;
	public $hip;
	public $waihip;

	public $hb;
	public $glu;
	public $hba1c;

	public $na;
	public $k;
	public $krea;
	public $kolest;

	public $ldlkol;
	public $hdlkol;
	public $trigly;

	public $tsh;
	public $ft4;
	public $crp;
	public $ualbu;

	public $bts;
	public $btd;
	public $pulse;

	public $btsday;
	public $btdday;

	public $btsnig;
	public $btdnig;

	public $btsone;
	public $btdone;

	public $serum;
	public $plasma;

	function __construct() {
		parent::__construct();
	}

	public function reset() {
		$this->_id = false;
		$this->patient = 0;
	}

	public function load($patient_token, $datum) {
		$today = date('Y-m-d');

		$this->db->select('*');
		$this->db->from('crfs');
		$this->db->join('patients', 'crfs.patient = patients.id', 'inner');
		$this->db->where(array('crfs.datum' => $today, 'patients.token' => $patient_token));

		$rs = $this->db->get();
		if ($rs->num_rows() > 0) {
			$row = $rs->row_array();
			// set vars
			return true;
		} else {
			$this->reset();
			return false;
		}
	}

	public function save() {
	}

	public function get_items() {
	}
}

