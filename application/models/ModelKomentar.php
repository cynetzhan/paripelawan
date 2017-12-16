<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKomentar extends CI_Model {
 
 public $idcol = "id_komentar";
 public $table = "webinfo_komentar";
 
 function create($data){
  return $this->db->insert($this->table,$data);
 }
 
 function read($id=null){
  if($id!=null){
   $this->db->where($this->idcol,$id);
  }
  return $this->db->get($this->table)->row();
 }
 
 function read_all($where=null){
  if($where!=null){
   $this->db->where($where);
  }
  return $this->db->get($this->table)->result();
 }
 
 function update($data){
  $this->db->where($this->idcol,$data[$this->idcol]);
  return $this->db->update($this->table,$data);
 }
 
 function delete($id){
  $this->db->where($this->idcol,$id);
  return $this->db->delete($this->table);
 }
 
 function baked_komentar($id){
  $this->load->helper('security');
  $data['komentar'] = (array)$this->read_all("id_artikel = ".$id);
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
}