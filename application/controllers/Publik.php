<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publik extends CI_Controller {
 
 function __construct(){
  parent::__construct();
  $this->load->model(array('ModelArtikel','ModelKategori','ModelKomentar','ModelWisata','ModelObjekWisata','ModelTestimoni'));
  $this->load->helper(array('security'));
  
 }

	public function index()
	{
  $this->ModelTestimoni->table="testimoni,objek_wisata";
  $data = array(
   'judul' => "Halaman Depan",
   'publik' => $this->ModelArtikel->read_all(5,0,'webinfo_artikel.id_kategori != 7'),
   'objek' => $this->ModelObjekWisata->read_all(5,0,'objek_wisata.featured_objek = 1'),
   'artikel_slider' => $this->ModelArtikel->read_all(5,0,'webinfo_artikel.highlight_slider = 1'),
   'testi_baru' => $this->ModelTestimoni->read_all("testimoni.id_objek = objek_wisata.id_objek",5,0,'desc','tgl_testi')
  );
  $this->template->load('template/home_v2','hal_depan',$data);
	}
 
 public function artikel($id){
  $artikel = $this->ModelArtikel->read($id);
  $data = array(
   'judul' => $artikel->judul_artikel,
   'artikel' => $artikel,
   'komentar' => $this->_komentar($id)
  );
  $this->template->load('template/home_v2','post',$data);
 }
 
 public function wisataobj($id){
  $data = array(
   'objek' => $this->ModelObjekWisata->read($id),
   'testi' => $this->ModelTestimoni->read_all('id_objek = '.$id),
   'nilai_avg_testi' => $this->ModelTestimoni->read_nilai('id_objek = '.$id)
  );
  $data['objek_sekitar'] = $this->ModelObjekWisata->read_all_sekitar_objek($id, array($data['objek']->lat_objek, $data['objek']->long_objek));
  $data['judul'] = $data['objek']->nama_objek;
  $this->template->load('template/home_v2','wisata',$data);
  //echo var_dump($data);
 }
 
 public function wisata($id,$page=0){
  $wisata = $this->ModelWisata->read($id);
  $jumlahObjek = count($this->ModelObjekWisata->read_all(0,0,'objek_wisata.id_wisata = '.$id));
  $limit = 10;
  $data = array(
   'judul' => "".$wisata->nama_wisata,
   'objek' => $this->ModelObjekWisata->read_all($limit,$limit * $page,'objek_wisata.id_wisata = '.$id),
   'id_wisata' => $id,
   'artikel_slider' => $this->ModelObjekWisata->read_all(5,0,'objek_wisata.id_wisata = "'.$id.'" and objek_wisata.featured_objek = 1')
  );
  if($page > 0)
   $data['newer'] = $page - 1;
  if($page < (floor($jumlahObjek/$limit) - 1) )
   $data['older'] = $page + 1;
  $this->template->load('template/home_v2','listwisata',$data);
 }
 
 public function kategori($id,$page=0){
  $kategori = $this->ModelKategori->read($id);
  $jumlahArtikel = count($this->ModelArtikel->read_all(0,0,'webinfo_artikel.id_kategori = '.$id));
  $limit = 10;
  $data = array(
   'judul' => "Kategori : ".$kategori->nama_kategori,
   'artikel' => $this->ModelArtikel->read_all($limit,$limit * $page,'webinfo_artikel.id_kategori = '.$id),
   'id_kategori' => $id
  );
  if($page > 0)
   $data['newer'] = $page - 1;
  if($page < (floor($jumlahArtikel/$limit) - 1) )
   $data['older'] = $page + 1;
  $this->template->load('template/home_v2','kategori',$data);
 }
 
 function _komentar($id_artikel){
  
  $data['komentar'] = (array)$this->ModelKomentar->read_all("id_artikel = ".$id_artikel);
  $komentar = array();
  foreach($data['komentar'] as $row){   
   $komentar[$row->id_komentar]['id_komentar'] = xss_clean($row->id_komentar);
   $komentar[$row->id_komentar]['nama_pengirim_komentar'] = xss_clean($row->nama_pengirim_komentar);
   $komentar[$row->id_komentar]['tgl_komentar'] = $row->tgl_komentar;
   $komentar[$row->id_komentar]['isi_komentar'] = xss_clean($row->isi_komentar);
   if($row->parent_id!=0){
    $komentar[$row->parent_id]['reply'][$row->id_komentar] = $komentar[$row->id_komentar];
    unset($komentar[$row->id_komentar]);
   }
  }
  return $komentar;
 }
 
 public function kirim_komentar(){
  $data=array(
   'nama_pengirim_komentar' => $this->input->post('nama_pengirim_komentar',true),
   'id_artikel' => $this->input->post('id_artikel',true),
   'tgl_komentar' => date('Y-m-d H:i:s'),
   'parent_id' => $this->input->post('parent_id',true),
   'isi_komentar' => $this->input->post('isi_komentar',true),
  );
  if($this->ModelKomentar->create($data)){
   redirect(base_url('publik/artikel/'.$data['id_artikel']));
  } else {
   
  }
 }
 
 public function kirim_testi(){
  $this->load->model('ModelTestimoni');
  $data=array(
   'nama_pengirim_testi' => $this->input->post('nama_pengirim_testi',true),
   'id_objek' => $this->input->post('id_objek',true),
   'tgl_testi' => date('Y-m-d H:i:s'),
   'nilai_testi' => $this->input->post('nilai_testi',true),
   'isi_testi' => $this->input->post('isi_testi',true),
  );
  if($this->ModelTestimoni->create($data)){
   redirect(base_url('publik/wisataobj/'.$data['id_objek']));
  } else {
   echo "Gagal";
  }
  
 }
 
 public function cari(){
  $query = $this->input->get('query');
  $limit = 6;
  $data = array(
   'judul' => 'Pencarian : "'.$query.'"',
   'query' => $query,
   'artikel' => $this->ModelArtikel->read_all($limit,0,'webinfo_artikel.judul_artikel like "%'.$query.'%"'),
   'wisata' => $this->ModelObjekWisata->read_all($limit,0,'objek_wisata.nama_objek like "%'.$query.'%"')
  );
  //echo var_dump($data);
  $this->template->load('template/home_v2','cari',$data);
 }
}
