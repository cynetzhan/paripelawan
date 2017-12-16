<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTestimoni extends CI_Model {
 
 public $idcol = "id_testi";
 public $table = "testimoni";
 
 function create($data){
  return $this->db->insert($this->table,$data);
 }
 
 function read($id=null){
  if($id!=null){
   $this->db->where($this->idcol,$id);
  }
  return $this->db->get($this->table)->row();
 }
 
 function read_all($where=null,$limit=0,$offset=0,$sort='DESC',$sortable='id_testi'){
  if($where!=null){
   $this->db->where($where);
  }
  $this->db->order_by($sortable,$sort);
  return $this->db->get($this->table,$limit,$offset)->result();
 }
 
 function update($data){
  $this->db->where($this->idcol,$data[$this->idcol]);
  return $this->db->update($this->table,$data);
 }
 
 function delete($id){
  $this->db->where($this->idcol,$id);
  return $this->db->delete($this->table);
 }
 
 function read_nilai($where=null){
  $this->db->select('id_objek,avg(nilai_testi) as total_nilai_testi');
  $hasil = $this->read_all($where);
  return $hasil;
 }
}