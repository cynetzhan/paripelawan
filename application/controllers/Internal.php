<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Internal extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
  $this->cekLogin();
  $data['judul']="Dashboard";
		$this->template->load('template/dash','welcome_message',$data);
	}
 
 function cekLogin($enabled=true){
  if($enabled){
   if(!isset($_SESSION['login_status']) || $_SESSION['login_status']==0){
     $this->session->set_flashdata(array('class'=>'danger','alert'=>'Gagal','message'=>'Anda Harus Login Terlebih Dahulu'));
     $this->session->set_userdata('login_status',0);
     redirect(base_url('internal/login'));
   } 
  }
 }
 
 public function login(){
  if(!isset($_SESSION['login_status']) || $_SESSION['login_status']==0){
   $this->load->view('form_login');
  } else {
   redirect(base_url('internal/'));
  }
 }
 
 public function logout(){
  $this->session->sess_destroy();
  redirect(base_url('internal/login'));
 }
 
 public function autentikasi(){
  //butuh validasi form login
  $this->cekLogin(false);
  $this->load->model('ModelPegawai');
  $auth['username_pegawai']=$this->input->post('username_pegawai');
  $auth['password_pegawai']=$this->input->post('password_pegawai');
  $dbrecord = $this->ModelPegawai->read($auth['username_pegawai']);
  if(($dbrecord->username_pegawai == $auth['username_pegawai']) && password_verify($auth['password_pegawai'],$dbrecord->password_pegawai)){
   $data = array(
     'login_status'=>'1',
     'username'=>$dbrecord->username_pegawai,
     'user_id'=>$dbrecord->id_pegawai,
     'user_akses'=>$dbrecord->level_sistem_pegawai
   );
   $this->session->set_userdata($data);
   redirect(base_url('internal/'));
  } else {
   //$this->session->set_userdata("try","+1");
   $this->session->set_flashdata(array('class'=>'danger','alert'=>'Gagal','message'=>'Username/Password yang Anda masukkan salah!'));
   //echo var_dump($dbrecord);
   redirect(base_url('internal/login'));
  }
 }
 
 public function error(){
  $data['judul'] = "Hak Akses Ditolak!";
  $this->template->load('template/dash','error',$data);
 }
}
