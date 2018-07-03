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
    $data = $this->m_basic->getAllData('location')->result_array();
    echo json_encode($data);
  }

  function kantorDinas()
  {
    $data = $this->m_basic->getAllData('location', array('sub-category' => 'Kantor Dinas'))->result_array();
    echo json_encode($data);
  }

  function kantorKecamatan()
  {
    $data = $this->m_basic->getAllData('location', array('sub-category' => 'Kantor Kecamatan'))->result_array();
    echo json_encode($data);
  }

  function pelayananUmum()
  {
    $data = $this->m_basic->getAllData('location', array('sub-category' => 'Pelayanan Umum'))->result_array();
    echo json_encode($data);
  }

  function bumd()
  {
    $data = $this->m_basic->getAllData('location', array('sub-category' => 'BUMD'))->result_array();
    echo json_encode($data);
  }

  function sekolahDasar()
  {
    $data = $this->m_basic->getAllData('location', array('sub-category' => 'SD'))->result_array();
    echo json_encode($data);
  }

  function smp()
  {
    $data = $this->m_basic->getAllData('location', array('sub-category' => 'SMP'))->result_array();
    echo json_encode($data);
  }

  function sma()
  {
    $data = $this->m_basic->getAllData('location', array('sub-category' => 'SMA/SMK'))->result_array();
    echo json_encode($data);
  }

  function rumahSakit()
  {
    $data = $this->m_basic->getAllData('location', array('sub-category' => 'Rumah Sakit'))->result_array();
    echo json_encode($data);
  }

  function puskesmas()
  {
    $data = $this->m_basic->getAllData('location', array('sub-category' => 'Puskesmas'))->result_array();
    echo json_encode($data);
  }

  function pariwisata()
  {
    $data = $this->m_basic->getAllData('location', array('sub-category' => 'Pariwisata'))->result_array();
    echo json_encode($data);
  }

  function kuliner()
  {
    $data = $this->m_basic->getAllData('location', array('sub-category' => 'Kuliner'))->result_array();
    echo json_encode($data);
  }

  function perbankan()
  {
    $data = $this->m_basic->getAllData('location', array('sub-category' => 'Perbankan'))->result_array();
    echo json_encode($data);
  }

  function umkm()
  {
    $data = $this->m_basic->getAllData('location', array('sub-category' => 'UMKM'))->result_array();
    echo json_encode($data);
  }

  function penginapan()
  {
    $data = $this->m_basic->getAllData('location', array('sub-category' => 'Penginapan'))->result_array();
    echo json_encode($data);
  }

  function sarana()
  {
    $data = $this->m_basic->getAllData('location', array('sub-category' => 'Sarana Prasarana'))->result_array();
    echo json_encode($data);
  }

  function search()
  {
    $keyword = $this->input->post('keyword');
    $data = $this->m_basic->search('location', array('name' => $keyword))->result_array();
    echo json_encode($data);
  }

  function login()
  {
    $user = $this->input->post('user');
    $pass = $this->input->post('pass');
    
    
  }


}
