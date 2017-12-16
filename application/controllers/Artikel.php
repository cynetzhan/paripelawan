<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(FCPATH."vendor/autoload.php");
use PHPHtmlParser\Dom;
class Artikel extends CI_Controller {
 
 function __construct(){
  parent::__construct();
  $this->load->model(array('ModelArtikel','ModelKategori'));
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

	public function index()
	{
  $data['judul']="Daftar Artikel";
  $data['query']=($this->input->get('query') != '')?$this->input->get('query'):"";
  $data['artikel'] = $this->ModelArtikel->read_all(0,0,'webinfo_artikel.judul_artikel like "%'.$data['query'].'%"');
  //echo var_dump($data);
		$this->template->load('template/dash','lihat_artikel',$data);
	}
 
 public function tambah($id_kategori=null){
  $kategori = $this->ModelKategori->read_all();
  $data = array(
   'parent_link'=>base_url('artikel/'),
   'parent'=>"Daftar Artikel",
   'tgl_terbit_artikel' => set_value('tgl_terbit_artikel',date('Y-m-d h:i:s')),
   'judul_artikel' => set_value('judul_artikel'),
   'isi_artikel' => set_value('isi_artikel'),
   'id_kategori' => ($id_kategori!==null)?set_value('id_kategori',$id_kategori):set_value('id_kategori'),
   'id_artikel' => set_value('id_artikel'),
   'highlight_slider' => set_value('highlight_slider'),
   'kategori' => $kategori
  );
  $data['judul']="Tambah Artikel";
  $data['action']=base_url('artikel/aksi_tambah');
  $this->template->load('template/dash','form_artikel',$data);
 }
 
 public function ubah($id){
  hak_akses(array(0,1,2),true);
  $artikel = $this->ModelArtikel->read($id);
  $kategori = $this->ModelKategori->read_all();
  if($artikel->id_pegawai === $this->session->user_id){
  $data = array(
   'parent_link'=>base_url('artikel/'),
   'parent'=>"Daftar Artikel",
   'judul_artikel' => set_value('judul_artikel',$artikel->judul_artikel),
   'tgl_terbit_artikel' => set_value('tgl_terbit_artikel',$artikel->tgl_terbit_artikel),
   'isi_artikel' => set_value('isi_artikel',$artikel->isi_artikel),
   'id_kategori' => set_value('id_kategori',$artikel->id_kategori),
   'id_artikel' => set_value('id_artikel',$artikel->id_artikel),
   'highlight_slider' => set_value('highlight_slider',$artikel->highlight_slider),
   'kategori' => $kategori,
   'id_pegawai' => set_value('id_pegawai', $artikel->id_pegawai)
  );
  $data['judul']="Sunting Artikel";
  $data['action']=base_url('artikel/aksi_ubah');
  $this->template->load('template/dash','form_artikel',$data);
  } else {
   redirect(base_url('internal/error'));
  }
 }
 
 public function hapus($id){
  hak_akses(array(2),true);
  if($this->ModelArtikel->delete($id)){
   $this->flashMsg("Berhasil dihapus!","","");
  } else {
   $this->flashMsg("Gagal dihapus!","","");
  }
  redirect(base_url('artikel/'));
 }
 
 public function hapus_komentar($id){
  hak_akses(array(2),true);
  $this->load->model('ModelKomentar');
  $id_artikel = $this->ModelKomentar->read($id)->id_artikel;
  if($this->ModelKomentar->delete($id)){
   $this->flashMsg("Berhasil dihapus!","","");
  } else {
   $this->flashMsg("Gagal dihapus!","","");
  }
  redirect(base_url('artikel/komentar/'.$id_artikel));
 }
 
 public function komentar($id){
  $this->load->model('ModelKomentar');
  $data = array(
   'parent_link'=>base_url('artikel/'),
   'parent'=>"Daftar Artikel",
   'komentar' => $this->ModelKomentar->baked_komentar($id),
   'artikel' => $this->ModelArtikel->read($id),
  );
  $data['judul'] = "Komentar";
  $this->template->load('template/dash','lihat_komentar',$data);
 }
 
 public function aksi_tambah(){
  hak_akses(array(0,1,2),true);
  $data = array(
   'judul_artikel' => $this->input->post('judul_artikel'),
   'tgl_terbit_artikel' => date('Y-m-d H:i:s'),
   'isi_artikel' => $this->input->post('isi_artikel'),
   'id_kategori' => $this->input->post('id_kategori'),
   'id_pegawai' => $this->input->post('id_pegawai'),
   'highlight_slider' => ($this->input->post('highlight_slider') !== null)?"1":"0"
  );
  
  // ambil foto pertama sebagai thumbnail cover artikel
  $dom = new Dom;
  $dom->load($data['isi_artikel']);
  $img = $dom->find('img');
  if(count($img) != 0){
   $exp =  explode('../',$img[0]->tag->src['value']);
   $data['cover_artikel'] = $exp[2];
  }
  
  if($this->ModelArtikel->create($data)){
   $this->session->set_flashdata('message','Berhasil!');
  }
  redirect(base_url('artikel/'));
 }
 
 public function aksi_upload(){
  if(hak_akses(array(0,1,2))){
   $config['upload_path']   = FCPATH.'images/';
   $config['allowed_types'] = 'gif|jpg|png';
   $config['max_size']      = 2048;

   $this->load->library('upload', $config);

   if ( ! $this->upload->do_upload('images')){
     $error = array('error' => $this->upload->display_errors());
     print_r($error);
   } else {
     $this->_image_dir();
   }
  } else {
   echo "Akses Terlarang";
  }
 }
 
 function _image_dir(){
    $folder = new DirectoryIterator(FCPATH."images/");
    foreach($folder as $img) {
     if(!$img->isDot()){
      echo '<li><img class="img img-responsive galeri-item" src="'.base_url("images/".$img->getFilename()).'"/></li>';
     } 
   }
 }
 
 public function aksi_ubah(){
  hak_akses(array(0,1,2),true);
  $data = array(
   'judul_artikel' => $this->input->post('judul_artikel'),
   'isi_artikel' => $this->input->post('isi_artikel'),
   'id_kategori' => $this->input->post('id_kategori'),
   'id_artikel' => $this->input->post('id_artikel'),
   'highlight_slider' => ($this->input->post('highlight_slider') !== null)?"1":"0"
  );
  
  $dom = new Dom;
  $dom->load($data['isi_artikel']);
  $img = $dom->find('img');
  if(count($img) != 0){
   $exp =  explode('../',$img[0]->tag->src['value']);
   $data['cover_artikel'] = $exp[2];
  }
  if($this->input->post('id_pegawai') === $this->session->user_id){
   if($this->ModelArtikel->update($data)){
    $this->session->set_flashdata('message','Berhasil!');
    redirect(base_url('artikel/'));
   } else {
    redirect(base_url('artikel/ubah/'.$data['id_artikel']));
   }
  } else {
   redirect(base_url('internal/error'));
  }
 }
 
 private function flashMsg($msg,$alt,$cls){
  $this->session->set_flashdata(array('class'=>$cls,'alert'=>$alt,'message'=>$msg));
 }
}
