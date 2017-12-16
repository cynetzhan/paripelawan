<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKategori extends CI_Model {
 
 public $idcol = "id_kategori";
 public $table = "webinfo_kategori";
 
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
}