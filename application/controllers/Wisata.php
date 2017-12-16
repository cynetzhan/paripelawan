<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {
 
 function __construct(){
  parent::__construct();
  $this->load->model(array('ModelWisata','ModelObjekWisata'));
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
  $data['judul']="Daftar Wisata";
  $data['wisata']=$this->ModelWisata->read_all();
  //echo var_dump($data);
		$this->template->load('template/dash','lihat_wisata',$data);
	}
 
 public function lihat($id){
  $this->load->model('ModelObjekWisata');
  $wisata = $this->ModelWisata->read($id);
  $data = array(
   'parent_link'=>base_url('wisata/'),
   'parent'=>"Daftar Wisata",
   'judul' => "Daftar Objek Wisata ".$wisata->nama_wisata,
   'wisata' => $this->ModelObjekWisata->read_all(0,0,"objek_wisata.id_wisata = ".$id),
   'id_wisata' => $id
  );
  $this->template->load('template/dash','lihat_objek',$data);
 }
 
 public function tambah(){
  
  $data = array(
   'parent_link'=>base_url('wisata/'),
   'parent'=>"Daftar Wisata",
   'id_wisata' => set_value('id_wisata'),
   'nama_wisata' => set_value('nama_wisata')
  );
  $data['judul']="Tambah Objek Wisata";
  $data['action']=base_url('wisata/aksi_tambah');
  $this->template->load('template/dash','form_wisata',$data);
 }
 
 public function ubah($id){
  $wisata = $this->ModelWisata->read($id);
  $data = array(
   'parent_link'=>base_url('wisata/'),
   'parent'=>"Objek Wisata",
   'nama_wisata' => set_value('nama_wisata',$wisata->nama_wisata),
   'id_wisata' => set_value('id_wisata',$wisata->id_wisata)
  );
  $data['judul']="Sunting Wisata";
  $data['action']=base_url('wisata/aksi_ubah');
  $this->template->load('template/dash','form_wisata',$data);
 }
 
 public function hapus($id){
  if($this->ModelWisata->delete($id)){
   $this->flashMsg("Berhasil dihapus!","","");
  } else {
   $this->flashMsg("Gagal dihapus!","","");
  }
  redirect(base_url('wisata/'));
 }
 
 public function hapus_gambar($id,$foto){
  $old_data = $this->ModelObjekWisata->read($id);
  $list_gambar = json_decode($old_data->gambar_objek);
  $idx = array_search($foto,$list_gambar);
  unset($list_gambar[$idx]);
  $data = array(
   'id_objek' => $id,
   'gambar_objek' => json_encode($list_gambar)
  );
  if($this->ModelObjekWisata->update($data)) {
   if(!unlink(FCPATH.'images/'.$foto)) {
    $this->flashMsg("Tidak Dapat Menghapus Gambar!",'Kesalahan!','danger');
    } else {
     $this->flashMsg("Gambar telah dihapus!",'Berhasil!','warning');
    }
  } else {
   $this->flashMsg("Tidak Dapat Menghapus Gambar!",'Kesalahan!','danger');
  }
  redirect(base_url('wisata/ubah_objek/'.$id));
 }
 
 public function tambah_objek($id_wisata){
  $wisata = $this->ModelWisata->read_all();
  $data = array(
   'parent_link'=>base_url('wisata/lihat/'.$id_wisata),
   'parent'=>"Daftar Objek Wisata",
   'nama_objek' => set_value('nama_objek'),
   'alamat_objek' => set_value('alamat_objek'),
   'lat_objek' => set_value('lat_objek'),
   'long_objek' => set_value('long_objek'),
   'gambar_objek' => set_value('gambar_objek'),
   'ket_objek' => set_value('ket_objek'),
   'id_wisata' => ($id_wisata!==null)?set_value('id_wisata',$id_wisata):set_value('id_wisata'),
   'featured_objek' => set_value('featured_objek'),
   'kode_video' => set_value('kode_video'),
   'id_objek' => set_value('id_objek'),
   'wisata' => $wisata,
   'rincian_lain' => $this->get_detail_field($id_wisata)
  );
  $data['judul']="Tambah Objek Wisata";
  $data['action']=base_url('wisata/aksi_tambah_objek/');
  $this->template->load('template/dash','form_objek',$data);
 }
 
 public function ubah_objek($id){
  $objek = $this->ModelObjekWisata->read($id);
  $data = array(
   'parent_link'=>base_url('wisata/lihat/'.$objek->id_wisata),
   'parent'=>"Objek Wisata",
   'nama_objek' => set_value('nama_objek',$objek->nama_objek),
   'alamat_objek' => set_value('alamat_objek',$objek->alamat_objek),
   'gambar_objek' => json_decode($objek->gambar_objek),
   'lat_objek' => set_value('lat_objek',$objek->lat_objek),
   'long_objek' => set_value('long_objek',$objek->long_objek),
   'ket_objek' => set_value('ket_objek',$objek->ket_objek),
   'id_wisata' => set_value('id_wisata',$objek->id_wisata),
   'featured_objek' => set_value('featured_objek',$objek->featured_objek),
   'kode_video' => set_value('kode_video',$objek->kode_video),
   'id_objek' => set_value('id_objek',$objek->id_objek),
   'wisata' => $this->ModelWisata->read_all(),
   'rincian_lain' => $this->get_detail_field($objek->id_wisata)
  );
  $data['rincian_data'] = json_decode($objek->rincian_objek,TRUE); // mengubah json data di db menjadi array (arg TRUE agar return sebagai assoc array)
  //echo var_dump($data);
  $data['judul']="Edit Objek Wisata";
  $data['action']=base_url('wisata/aksi_ubah_objek/');
  $this->template->load('template/dash','form_objek',$data);
 }
 
 public function aksi_tambah_objek(){
  $data = array(
   'nama_objek' => $this->input->post('nama_objek'),
   'alamat_objek' => $this->input->post('alamat_objek'),
   'lat_objek' => $this->input->post('lat_objek'),
   'long_objek' => $this->input->post('long_objek'),
   'ket_objek' => $this->input->post('ket_objek'),
   'kode_video' => youtube_parse($this->input->post('kode_video')),
   'featured_objek' => ($this->input->post('featured_objek') !== null)?"1":"0",
   'id_wisata' => $this->input->post('id_wisata'),
  );
  
  // File upload handle
  $config['upload_path']   = FCPATH.'images/';
  $config['allowed_types'] = 'gif|jpg|png|jpeg';
  $config['max_size']      = 2048;

  $this->load->library('upload', $config);

  if ( ! $this->upload->do_upload('images') && ! $this->upload->data('is_image') ){
    $error = array('error' => $this->upload->display_errors());
    if($error['error'] == "You did not select a file to upload."){
     $this->flashMsg($this->upload->display_errors(),"","");
    }
  } else {
    $data['gambar_objek'] = $this->upload->data('file_name');
  }
  
  // Detail rincian handle
  $field = $this->get_detail_field($this->input->post('id_wisata'));
  $rincian_objek = array();  
  foreach($field as $fd){ // rincian dibentuk menjadi array
   $rincian_objek[$fd] = $this->input->post(strtolower(str_replace(' ','_',$fd)));
  }
  $data['rincian_objek'] = json_encode($rincian_objek); // array rincian diubah menjadi json data
  if($this->ModelObjekWisata->create($data)){
   redirect(base_url('wisata/lihat/'.$data['id_wisata']));
  }
  
  //echo var_dump($data);
  //echo var_dump(json_decode($data['rincian_objek']));
 }
 
 public function aksi_ubah_objek(){
  $data = array(
   'nama_objek' => $this->input->post('nama_objek'),
   'alamat_objek' => $this->input->post('alamat_objek'),
   'lat_objek' => $this->input->post('lat_objek'),
   'long_objek' => $this->input->post('long_objek'),
   'ket_objek' => $this->input->post('ket_objek'),
   'id_wisata' => $this->input->post('id_wisata'),
   'kode_video' => youtube_parse($this->input->post('kode_video')),
   'featured_objek' => ($this->input->post('featured_objek') !== null)?"1":"0",
   'id_objek' => $this->input->post('id_objek'),
  );
  $old_data = $this->ModelObjekWisata->read($data['id_objek']);
  $list_gambar = json_decode($old_data->gambar_objek);
  
   // File upload handle
  $config['upload_path']   = FCPATH.'images/';
  $config['allowed_types'] = 'gif|jpg|png|jpeg';
  $config['max_size']      = 5120;
  $config['file_name']     = "Objek-".$data['id_objek']."-".count($list_gambar);

  $this->load->library('upload', $config);

  if ( ! $this->upload->do_upload('images') && ! $this->upload->data('is_image') ){
    $error = array('error' => $this->upload->display_errors());
    if($error['error'] == "You did not select a file to upload."){
     $this->flashMsg($this->upload->display_errors(),"","");
    }
  } else {
    $list_gambar[] = $this->upload->data('file_name');
    $data['gambar_objek'] = json_encode($list_gambar);
    //unlink($config['upload_path'].$old_data->gambar_objek);
  }
  
  $field = $this->get_detail_field($this->input->post('id_wisata'));
  $rincian_objek = array();  
  foreach($field as $fd){ // rincian dibentuk menjadi array
   $rincian_objek[$fd] = $this->input->post(strtolower(str_replace(' ','_',$fd)));
  }
  $data['rincian_objek'] = json_encode($rincian_objek); // array rincian diubah menjadi json data
  if($this->ModelObjekWisata->update($data)){
   $this->flashMsg("Berhasil!");
   redirect(base_url('wisata/lihat/'.$data['id_wisata']));
  }
 }
 
 public function aksi_tambah(){
  $data = array(
   'nama_wisata' => $this->input->post('nama_wisata'),
  );
  if($this->ModelWisata->create($data)){
   $this->session->set_flashdata('message','Berhasil!');
  }
  redirect(base_url('wisata/'));
 }
 
 public function aksi_ubah(){
  $data = array(
   'nama_wisata' => $this->input->post('nama_wisata'),
   'id_wisata' => $this->input->post('id_wisata')
  );
  if($this->ModelWisata->update($data)){
   $this->session->set_flashdata('message','Berhasil!');
   redirect(base_url('wisata/'));
  } else {
   redirect(base_url('wisata/ubah/'.$data['id_wisata']));
  }
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
 
 public function ulasan($id){
  $this->load->model("ModelTestimoni");
  $data = array(
   'objek' => $this->ModelObjekWisata->read($id),
   'testi' => $this->ModelTestimoni->read_all("id_objek = ".$id)
  );
  $data['judul']="Ulasan";
  $data['parent_link']=base_url('wisata/lihat/'.$data['objek']->id_wisata);
  $data['parent']="Objek Wisata";
  $this->template->load('template/dash','lihat_testimoni',$data);
 }
 
 private function get_detail_field($id) {
  // Hard-coded rincian tambahan untuk setiap objek wisata berdasarkan jenis wisatanya
  $field = array(
   1=> ['Telepon','Tarif','Jenis Penginapan'], //Hotel 
   2=> [], //Kuliner
   3=> ['Tarif','Jenis Transportasi'], //Biro Wisata
   4=> ['Tanggal','Jam'], //Event
   5=> [], //Kerajinan Lokal
   6=> []
  );
  return $field[$id];
 }
 
 private function flashMsg($msg,$alt,$cls){
  $this->session->set_flashdata(array('class'=>$cls,'alert'=>$alt,'message'=>$msg));
 }
}
