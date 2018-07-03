<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hollow extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_basic');
  }

  function load_view($url, $data=null)
  {
    $this->load->view('hollow/head');
    $this->load->view('hollow/header');
    $this->load->view('hollow/sidebar');

    if ($data !== null) {
        $this->load->view('hollow/'.$url, $data);
    } else {
        $this->load->view('hollow/'.$url);
    }
    
    $this->load->view('hollow/footer');
  }

	public function index()
	{
        if ($this->session->login_in == FALSE) {
            $this->load->view('hollow/login');
        } else {
            redirect('hollow/dashboard', 'refresh');
        }
        
        
        $login = $this->input->post('login');

		if (isset($login)) {
			$user = $this->input->post('user');
			$pass = $this->input->post('pass');

			// check user
			$count = $this->m_basic->getNumRows('user', array('user' => $user, 'pass' => sha1($pass), 'status' => 1));

			//set date
			date_default_timezone_set("Asia/Bangkok");
			$date = new DateTime();
			$lastlogin = $date->format('Y-m-d H:i:s');

			//check device
			if ($this->agent->is_browser())
			{
				$agent = $this->agent->platform(). ', ' .$this->agent->browser().' '.$this->agent->version();
			}
			elseif ($this->agent->is_robot())
			{
			    $agent = $this->agent->robot();
			}
			elseif ($this->agent->is_mobile())
			{
		        $agent = $this->agent->platform(). ', ' .$this->agent->mobile();
			}
			else
			{
			    $agent = 'Unidentified User Agent';
			}

			if ($count == 1) {

            $user_account = array (
              'login_in' => TRUE,
              'user' => $user
            );

            $data = array(
              'last_login' => $lastlogin,
              'device' => $agent
            );

            $this->session->set_userdata($user_account);
            $this->m_basic->updateData('user', $data, array('user' => $user));

            redirect('hollow/dashboard', 'refresh');
				
			} else {

				$this->session->set_flashdata('error', true);
				redirect('hollow','refresh');

			}
		}
    }
    
    function dashboard()
    {
        $this->load_view('dashboard');
    }

    function lokasi()
    {
        $lokasi = $this->m_basic->getAllData('location')->result_array();
        $data['location'] = $lokasi;
        $this->load_view('lokasi', $data);
    }

    function kategori()
    {   
        $category = $this->m_basic->getAllData('category', null, array('category' => 'ASC'))->result_array();
        $subcategory = $this->m_basic->getAllData('sub-category', null, array('category' => 'ASC'))->result_array();

        $data['category'] = $category;
        $data['subcategory'] = $subcategory;

        $this->load_view('kategori', $data);
    }

    function statistik()
    {
        $this->load_view('statistik');
    }

    function logout()
    {
        $this->session->sess_destroy();
		redirect('hollow', 'refresh');
    }
}
