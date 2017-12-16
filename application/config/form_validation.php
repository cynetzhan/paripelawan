<?php
 $config = array(
  'pegawai/tambah' => array(
      array('field' => 'ni_pegawai', 'label' => 'NIP/NIK', 'rules' => 'required|max_length[18]'),
      array('field' => 'nama_pegawai', 'label' => 'Nama Pegawai', 'rules' => 'required'),
      array('field' => 'username_pegawai', 'label' => 'Username Pegawai', 'rules' => 'required|min_length[5]|max_length[20]|is_unique[pegawai.username_pegawai]'),
      array('field' => 'level_sistem_pegawai', 'label' => 'Jabatan', 'rules' => 'required'),
  )
 );
?>