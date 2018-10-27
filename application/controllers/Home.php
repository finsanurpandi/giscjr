<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_basic');
  }

  function load_view($url, $data=null)
  {
    $this->load->view('head');
    $this->load->view('header');
    $this->load->view('sidebar');

    if ($data !== null) {
        $this->load->view($url, $data);
    } else {
        $this->load->view($url);
    }
    
    $this->load->view('footer');
  }

	public function index()
	{
    $category = $this->m_basic->getAllData('category')->result_array();
    $data['category'] = $category;

		$this->load_view('pages/gis', $data);
	}
}
