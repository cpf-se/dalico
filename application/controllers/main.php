<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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
		$this->load->model('MainModel');
		$data = $this->MainModel->get_all_patients($offset, Main::ITEMS_PER_PAGE);
		$data['per_page'] = Main::ITEMS_PER_PAGE;
		$this->load->view('main', $data);
	}

	function index($offset = 0) {
		$this->view($offset);
	}
}

