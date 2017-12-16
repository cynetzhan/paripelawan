<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelObjekWisata extends CI_Model {
 
 public $idcol = "id_objek";
 public $table = "objek_wisata";
 
 function get_fields(){
  return $this->fields = $this->db->list_fields($this->table);
 }
 
 function create($data){
  return $this->db->insert($this->table,$data);
 }
 
 function read($id=null){
  $this->db->select('objek_wisata.*,wisata.nama_wisata');
  $this->db->where('objek_wisata.id_wisata = wisata.id_wisata');
  if($id!=null){
   $this->db->where($this->idcol,$id);
  }
  return $this->db->get($this->table.', wisata')->row();
 }
 
 function read_all($limit=0,$offset=0,$where=null,$order=array('id_objek','desc')){
  $this->db->select('objek_wisata.*,wisata.nama_wisata');
  $this->db->where('objek_wisata.id_wisata = wisata.id_wisata');
  $this->db->order_by($order[0],$order[1]);
  if($where!=null){
   $this->db->where($where);
  }
  $this->db->limit($limit,$offset);
  return $this->db->get($this->table.', wisata')->result();
 }
 
 function read_all_sekitar_objek($id, $coord){ // $coord (Array) [lat,lng]
  $this->db->select('objek_wisata.nama_objek, objek_wisata.alamat_objek,objek_wisata.id_objek,wisata.nama_wisata');
  $this->db->select("( 6371 * acos( cos( radians(".$coord[0].") ) * cos( radians( lat_objek ) ) * cos( radians( long_objek ) - radians(".$coord[1].") ) + sin( radians(".$coord[0].") ) * sin( radians( lat_objek ) ) ) ) AS distance");
  $this->db->where('objek_wisata.id_wisata = wisata.id_wisata');
  $this->db->having("distance < 5");
  $this->db->order_by("distance");
  $this->db->where('objek_wisata.id_objek != '.$id);
  return $this->db->get($this->table.', wisata')->result();
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