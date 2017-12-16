<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
 
 function __construct(){
  parent::__construct();
  $this->load->model(array('ModelKategori'));
  $this->cekLogin();
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
  $data['judul']="Daftar Kategori";
  $data['kategori']=$this->ModelKategori->read_all();
  //echo var_dump($data);
		$this->template->load('template/dash','lihat_kategori',$data);
	}
 
 public function lihat($id){
  $this->load->model('ModelArtikel');
  $kategori = $this->ModelKategori->read($id);
  $data = array(
   'parent_link'=>base_url('kategori/'),
   'parent'=>"Daftar Kategori",
   'judul' => "Daftar Artikel ".$kategori->nama_kategori,
   'artikel' => $this->ModelArtikel->read_all(0,0,"webinfo_artikel.id_kategori = ".$id),
   'id_kategori' => $id
  );
  $this->template->load('template/dash','lihat_artikel',$data);
 }
 
 public function tambah(){
  
  $data = array(
   'parent_link'=>base_url('kategori/'),
   'parent'=>"Daftar Kategori",
   'id_kategori' => set_value('id_kategori'),
   'nama_kategori' => set_value('nama_kategori')
  );
  $data['judul']="Tambah Kategori";
  $data['action']=base_url('kategori/aksi_tambah');
  $this->template->load('template/dash','form_kategori',$data);
 }
 
 public function ubah($id){
  $kategori = $this->ModelKategori->read($id);
  $data = array(
   'parent_link'=>base_url('kategori/'),
   'parent'=>"Daftar Kategori",
   'nama_kategori' => set_value('nama_kategori',$kategori->nama_kategori),
   'id_kategori' => set_value('id_kategori',$kategori->id_kategori)
  );
  $data['judul']="Sunting Kategori";
  $data['action']=base_url('kategori/aksi_ubah');
  $this->template->load('template/dash','form_kategori',$data);
 }
 
 public function hapus($id){
  if($this->ModelKategori->delete($id)){
   $this->flashMsg("Berhasil dihapus!","","");
  } else {
   $this->flashMsg("Gagal dihapus!","","");
  }
  redirect(base_url('kategori/'));
 }
 
 public function aksi_tambah(){
  $data = array(
   'nama_kategori' => $this->input->post('nama_kategori'),
  );
  if($this->ModelKategori->create($data)){
   $this->session->set_flashdata('message','Berhasil!');
  }
  redirect(base_url('kategori/'));
 }
 
 public function aksi_ubah(){
  $data = array(
   'nama_kategori' => $this->input->post('nama_kategori'),
   'id_kategori' => $this->input->post('id_kategori')
  );
  if($this->ModelKategori->update($data)){
   $this->session->set_flashdata('message','Berhasil!');
   redirect(base_url('kategori/'));
  } else {
   redirect(base_url('kategori/ubah/'.$data['id_kategori']));
  }
 }
 
 private function flashMsg($msg,$alt,$cls){
  $this->session->set_flashdata(array('class'=>$cls,'alert'=>$alt,'message'=>$msg));
 }
}
