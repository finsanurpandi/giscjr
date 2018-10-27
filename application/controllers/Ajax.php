<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_basic');
  }

  function index()
  {
    echo "This is AJAX endpoint!!!";
  }

  function cianjur()
  {
    $data = $this->m_basic->getAllData('location', array('status' => '1'))->result_array();
    echo json_encode($data);
  }

  function kantorDinas()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'Kantor Dinas', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function kantorKecamatan()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'Kantor Kecamatan', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function pelayananUmum()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'Pelayanan Umum', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function bumd()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'BUMD', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function sekolahDasar()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'SD', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function smp()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'SMP', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function sma()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'SMA/SMK', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function perguruanTinggi()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'Perguruan Tinggi', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function rumahSakit()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'Rumah Sakit', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function puskesmas()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'Puskesmas', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function pariwisata()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'Pariwisata', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function kuliner()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'Kuliner', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function ritel()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'Ritel', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function perbankan()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'Perbankan', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function umkm()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'UMKM', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function penginapan()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'Penginapan', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function sarana()
  {
    $data = $this->m_basic->getAllData('location', array('sub_category' => 'Sarana Prasarana', 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function search()
  {
    $keyword = $this->input->post('keyword');
    $data = $this->m_basic->search('location', array('name' => $keyword, 'status' => '1'))->result_array();
    echo json_encode($data);
  }

  function login()
  {
    $user = $this->input->post('user');
    $pass = $this->input->post('pass');
    
    
  }


}
