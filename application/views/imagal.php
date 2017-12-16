<?php
$path=APPPATH."images/";
$folder = get_filenames($path);
foreach ($folder as $fileinfo) {
 var_dump($fileinfo);
}
$data="some data";
if(!write_file($path."adasaja.txt",$data)){
 echo "gagal";
} else {
 echo "Berhasil";
}