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
        if($this->session->login_in == TRUE){
            $this->load_view('dashboard');
        } else {
            redirect('hollow','refresh');
        }
    }

    function lokasi()
    {
        if($this->session->login_in == TRUE){
            $lokasi = $this->m_basic->getAllData('location', array('status' => 1))->result_array();
            $data['location'] = $lokasi;
            $this->load_view('lokasi', $data);
        } else {
            redirect('hollow','refresh');
        }
    }

    function verifikasi()
    {
        if($this->session->login_in == TRUE){
            $lokasi = $this->m_basic->getAllData('location', array('status' => 0))->result_array();
            $data['location'] = $lokasi;
            $this->load_view('verifikasi', $data);

            $accepted = $this->input->post('accepted');
            $denied = $this->input->post('denied');

            if (isset($accepted)) {
                $data = array('status' => 1);
                $where = array('id_location' => $this->input->post('id_location'));
                $this->m_basic->updateData('location', $data, $where);

                redirect($this->uri->uri_string());
            }

            if (isset($denied)) {
                $data = array('status' => 2);
                $where = array('id_location' => $this->input->post('id_location'));
                $this->m_basic->updateData('location', $data, $where);

                redirect($this->uri->uri_string());
            }
        } else {
            redirect('hollow','refresh');
        }
    }

    function kategori()
    {   
        if($this->session->login_in == TRUE){
            $category = $this->m_basic->getAllData('category', null, array('category' => 'ASC'))->result_array();
            $subcategory = $this->m_basic->getAllData('sub-category', null, array('category' => 'ASC'))->result_array();

            $data['category'] = $category;
            $data['subcategory'] = $subcategory;

            $this->load_view('kategori', $data);
        } else {
            redirect('hollow','refresh');
        }
    }

    function user()
    {
        if($this->session->login_in == TRUE){
            $contributor = $this->m_basic->getAllData('contributor')->result_array();
            $data['contributor'] = $contributor;
            $this->load_view('contributor', $data);
        } else {
            redirect('hollow','refresh');
        }
    }

    function statistik()
    {
        if($this->session->login_in == TRUE){
            $pemerintahan = $this->m_basic->getAllData('location', array('category' => 'Pemerintahan'))->result_array();
            $pendidikan = $this->m_basic->getAllData('location', array('category' => 'Pendidikan'))->result_array();
            $kesehatan = $this->m_basic->getAllData('location', array('category' => 'Kesehatan'))->result_array();
            $pariwisata = $this->m_basic->getAllData('location', array('category' => 'Pariwisata'))->result_array();
            $bidangusaha = $this->m_basic->getAllData('location', array('category' => 'Bidang Usaha'))->result_array();
            $sarana = $this->m_basic->getAllData('location', array('category' => 'Sarana Prasarana'))->result_array();

            $data['pemerintahan'] = $pemerintahan;
            $data['pendidikan'] = $pendidikan;
            $data['kesehatan'] = $kesehatan;
            $data['pariwisata'] = $pariwisata;
            $data['bidangusaha'] = $bidangusaha;
            $data['sarana'] = $sarana;

            $this->load_view('statistik', $data);
        } else {
            redirect('hollow','refresh');
        }
        
    }

    function pendidikan()
    {   
        if($this->session->login_in == TRUE){
            $district = $this->m_basic->getAllData('district')->result_array();
            $sd = $this->m_basic->getDataPendidikan('SD');
            $smp = $this->m_basic->getDataPendidikan('SMP');
            $sma = $this->m_basic->getDataPendidikan('SMA/SMK');
            $pt = $this->m_basic->getDataPendidikan('Perguruan Tinggi');
           

            $data['district'] = $district;
            $data['sd'] = $sd;
            $data['smp'] = $smp;
            $data['sma'] = $sma;
            $data['pt'] = $pt;

            $this->load_view('pendidikan', $data);
        } else {
            redirect('hollow','refresh');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
		redirect('hollow', 'refresh');
    }
}
