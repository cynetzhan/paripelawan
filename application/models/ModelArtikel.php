<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelArtikel extends CI_Model {
 
 public $idcol = "id_artikel";
 public $table = "webinfo_artikel";
 
 function create($data){
  return $this->db->insert($this->table,$data);
 }
 
 function read($id=null){
  $this->db->select('webinfo_artikel.*,webinfo_kategori.nama_kategori,pegawai.nama_pegawai');
  $this->db->where('webinfo_artikel.id_kategori = webinfo_kategori.id_kategori and webinfo_artikel.id_pegawai = pegawai.id_pegawai');
  if($id!=null){
   $this->db->where($this->idcol,$id);
  }
  return $this->db->get($this->table.', webinfo_kategori, pegawai')->row();
 }
 
 function read_all($limit=0,$offset=0,$where=null,$order=array('id_artikel','desc')){
  $this->db->select('webinfo_artikel.*,webinfo_kategori.nama_kategori,pegawai.nama_pegawai');
  $this->db->where('webinfo_artikel.id_kategori = webinfo_kategori.id_kategori and webinfo_artikel.id_pegawai = pegawai.id_pegawai');
  $this->db->order_by($order[0],$order[1]);
  if($where!=null){
   $this->db->where($where);
  }
  $this->db->limit($limit,$offset);
  return $this->db->get($this->table.', webinfo_kategori, pegawai')->result();
 }
 
 function update($data){
  $this->db->where($this->idcol,$data[$this->idcol]);
  return $this->db->update($this->table,$data);
 }
 
 function delete($id){
  $this->db->where($this->idcol,$id);
  return $this->db->delete($this->table);
 }
}