<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contributor extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_basic');
  }

  function load_view($url, $data=null)
  {
    $this->load->view('contributor/head');
    $this->load->view('contributor/header');
    $this->load->view('contributor/sidebar');

    if ($data !== null) {
        $this->load->view('contributor/'.$url, $data);
    } else {
        $this->load->view('contributor/'.$url);
    }
    
    $this->load->view('contributor/footer');
  }

  public function index()
  {
      if ($this->session->login_in == FALSE) {
          $this->load->view('contributor/login');
      } else {
          redirect('contributor/dashboard', 'refresh');
      }

    //$this->checkSession('dashboard');
      
      
      $login = $this->input->post('login');

      if (isset($login)) {
          $user = $this->input->post('user');
          $pass = $this->input->post('pass');

          // check user
          $count = $this->m_basic->getNumRows('contributor', array('user' => $user, 'pass' => sha1($pass), 'status' => 1));

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
          $this->m_basic->updateData('contributor', $data, array('user' => $user));

          redirect('contributor/dashboard', 'refresh');
              
          } else {

              $this->session->set_flashdata('error', true);
              redirect('contributor','refresh');

          }
        }
    }

    function register()
    {
        $this->load->view('contributor/register');
    }

    function dashboard()
    {
        if($this->session->login_in == TRUE){
            $this->load_view('dashboard');
        } else {
            redirect('contributor','refresh');
        }
 
    }

    function lokasi()
    {
        if($this->session->login_in == TRUE){
            $lokasi = $this->m_basic->getAllData('location', array('user' => $this->session->user))->result_array();
            $district = $this->m_basic->getAllData('district')->result_array();
            $category = $this->m_basic->getAllData('category', null, array('id' => 'ASC'))->result_array();
            $sub_category = $this->m_basic->getAllData('sub-category')->result_array();
            $type = $this->m_basic->getAllData('icon')->result_array();
            
            $data['category'] = $category;
            $data['sub_category'] = $sub_category;
            $data['location'] = $lokasi;
            $data['district'] = $district;
            $data['icon_type'] = $type;

            $this->load_view('lokasi', $data);

            $submit = $this->input->post('submit');
            if (isset($submit)) {
                //set date
                date_default_timezone_set("Asia/Bangkok");
                $date = new DateTime();
                $lastlogin = $date->format('Y-m-d H:i:s');

                $data = array(
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'district' => $this->input->post('district'),
                    'category' => $this->input->post('category'),
                    'sub_category' => $this->input->post('sub_category'),
                    'lat' => $this->input->post('lat'),
                    'lng' => $this->input->post('lng'),
                    'type' => $this->input->post('type'),
                    'user' => $this->session->user,
                    'date_added' => $lastlogin,
                    'last_update' => $lastlogin,
                    'status' => 0
                );

                $this->m_basic->insertData('location', $data);
                redirect($this->uri->uri_string());
            }
        } else {
            redirect('contributor','refresh');
        } 
    }

    function logout()
    {
        $this->session->sess_destroy();
		redirect('contributor', 'refresh');
    }
}
