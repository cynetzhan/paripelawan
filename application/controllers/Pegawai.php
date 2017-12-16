<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
 
 function __construct(){
  parent::__construct();
  $this->load->model(array('ModelPegawai'));
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
  $data['judul']="Data Pegawai";
  $data['pegawai_profil']=$this->ModelPegawai->read($this->session->user_id);
  if(hak_akses(array(2))):
   $data['pegawai']=$this->ModelPegawai->read_all();
  endif;
  //echo var_dump($data);
		$this->template->load('template/dash','lihat_pegawai',$data);
	}
 
 public function tambah(){
  hak_akses(array(2),true);
  $data = array(
   'parent_link'=>base_url('pegawai/'),
   'parent'=>"Data Pegawai",
   'id_pegawai' => set_value('id_pegawai'),
   'ni_pegawai' => set_value('ni_pegawai'),
   'nama_pegawai' => set_value('nama_pegawai'),
   'alamat_pegawai' => set_value('alamat_pegawai'),
   'telp_pegawai' => set_value('telp_pegawai'),
   'username_pegawai' => set_value('username_pegawai'),
   'password_pegawai' => set_value('password_pegawai'),
   'level_sistem_pegawai' => set_value('level_sistem_pegawai'),
  );
  $data['judul']="Tambah Pegawai";
  $data['action']=base_url('Pegawai/aksi_tambah');
  $this->template->load('template/dash','form_pegawai',$data);
 }
 
 public function ubah($id){
  $dbrecord = $this->ModelPegawai->read($id);
  $data = array(
   'parent_link'=>base_url('pegawai/'),
   'parent'=>"Data Pegawai",
   'id_pegawai' => set_value('id_pegawai',$dbrecord->id_pegawai),
   'ni_pegawai' => set_value('ni_pegawai',$dbrecord->ni_pegawai),
   'nama_pegawai' => set_value('nama_pegawai',$dbrecord->nama_pegawai),
   'alamat_pegawai' => set_value('alamat_pegawai',$dbrecord->alamat_pegawai),
   'telp_pegawai' => set_value('telp_pegawai',$dbrecord->telp_pegawai),
   'username_pegawai' => set_value('username_pegawai',$dbrecord->username_pegawai),
   'password_pegawai' => set_value('password_pegawai'),
   'level_sistem_pegawai' => set_value('level_sistem_pegawai',$dbrecord->level_sistem_pegawai),
   'nopasswordform' => true
  );
  $data['judul']="Ubah Data Pegawai";
  $data['action']=base_url('pegawai/aksi_ubah');
  $this->template->load('template/dash','form_pegawai',$data);
 }
 
 public function ubah_password($id){
  $dbrecord = $this->ModelPegawai->read($id);
  $data = array(
   'parent_link'=>base_url('pegawai/'),
   'parent'=>"Data Pegawai",
   'judul' => "Ubah Password Pegawai",
   'action' => base_url('pegawai/aksi_ubah_password'),
   'id_pegawai' => $id,
   'username_pegawai' => $dbrecord->username_pegawai,
   'nama_pegawai' => $dbrecord->nama_pegawai,
   'is_admin' => hak_akses(array(2)) // todo: check privilege of user
  );
  $this->template->load('template/dash','form_ubah_password',$data);
 }
 
 public function hapus($id){
  hak_akses(array(2),true);
  if($this->ModelPegawai->delete($id)){
   $this->flashMsg("Berhasil dihapus!","","");
  } else {
   $this->flashMsg("Gagal dihapus!","","");
  }
  redirect(base_url('pegawai/'));
 }
 
 public function record($id){}
 
 public function aksi_tambah(){
  hak_akses(array(2),true);
  $this->load->library('form_validation');
  if($this->form_validation->run() == FALSE){
   $data = array(
    'ni_pegawai' => $this->input->post('ni_pegawai'),
    'nama_pegawai' => $this->input->post('nama_pegawai'),
    'alamat_pegawai' => $this->input->post('alamat_pegawai'),
    'telp_pegawai' => $this->input->post('telp_pegawai'),
    'username_pegawai' => $this->input->post('username_pegawai'),
    'password_pegawai' => password_hash($this->input->post('password_pegawai'),PASSWORD_DEFAULT),
    'level_sistem_pegawai' => $this->input->post('level_sistem_pegawai'),
   );
   if($this->ModelPegawai->create($data)){
    $this->session->set_flashdata('message','Berhasil!');
    redirect(base_url('pegawai/'));
   }
  }
  else {
   redirect(base_url('pegawai/tambah'));
  }
  //echo var_dump($data);
 }
 
 public function aksi_ubah(){
  $data = array(
   'ni_pegawai' => $this->input->post('ni_pegawai'),
   'nama_pegawai' => $this->input->post('nama_pegawai'),
   'alamat_pegawai' => $this->input->post('alamat_pegawai'),
   'telp_pegawai' => $this->input->post('telp_pegawai'),
   'username_pegawai' => $this->input->post('username_pegawai'),
   'level_sistem_pegawai' => $this->input->post('level_sistem_pegawai'),
   'id_pegawai' => $this->input->post('id_pegawai')
  );
  if($this->ModelPegawai->update($data)){
   $this->session->set_flashdata('message','Berhasil!');
   redirect(base_url('pegawai/ubah/'.$data['id_pegawai']));
  }
 }
 
 public function aksi_ubah_password(){
  $id = $this->input->post('id_pegawai');
  $dbrecord = $this->ModelPegawai->read($id);
  $field_auth = ($this->input->post('password_pegawai') !== null)?$this->input->post('password_pegawai'):$this->input->post('password_admin');
  $is_auth = false;
  if(hak_akses(array(2))){
   $admin = $this->ModelPegawai->read($this->session->user_id);
   $is_auth = password_verify($field_auth,$admin->password_pegawai);
   echo "wah";
   echo var_dump($this->session->user_id);
   echo var_dump($field_auth);
  } else {
   $is_auth = password_verify($field_auth,$dbrecord->password_pegawai);
  }
  // pass 1 : cek apakah password di db sesuai dengan password yang sekarang dimasukkan. TODO: ganti null dengan password dari db
  if($is_auth){
     // pass 2 : cek apakah password baru sama dengan password konfirmasi
     if($this->input->post('password_pegawai_baru') === $this->input->post('password_pegawai_konfirmasi')){
       // hashing password baru yang dimasukkan
       $data = array(
        'id_pegawai' => $id,
        'password_pegawai' => password_hash($this->input->post('password_pegawai_baru'),PASSWORD_DEFAULT)
       );
       // pass 3 : update db dan cek apakah password baru tersimpan di db
       if($this->ModelPegawai->update($data)){
        $this->flashMsg("Password berhasil diubah","Berhasil!","success");
        redirect(base_url('pegawai/'));
       } else {
        $this->flashMsg("Terjadi kesalahan pada koneksi database. Coba lagi beberapa saat","Gagal!","danger");
        redirect(base_url('pegawai/ubah_password/'.$id));
        // pass 3 gagal! 
       }
     } else {
      $this->flashMsg("Konfirmasi password baru gagal! Silahkan coba lagi","Gagal!","danger");
      redirect(base_url('pegawai/ubah_password/'.$id));
      // pass 2 gagal!
     }
   } else {
    $this->flashMsg("Password lama tidak sesuai. Silahkan coba lagi","Gagal!","danger");
    redirect(base_url('pegawai/ubah_password/'.$id));
    // pass 1 gagal!
   }
}

 private function flashMsg($msg,$alt,$cls){
  $this->session->set_flashdata(array('class'=>$cls,'alert'=>$alt,'message'=>$msg));
 }

}
