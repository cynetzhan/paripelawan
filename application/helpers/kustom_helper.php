<?php
function hak_akses($level=array(),$redirect=false){
 $CI =& get_instance();
 $accepted = 0;
 foreach($level as $lv){
  if($CI->session->user_akses == $lv)
   $accepted += 1;
 }
 if($accepted > 0){
  return TRUE;
 } else {
  if($redirect){
   redirect(base_url('internal/error'));
  }
  return FALSE;
 }
}

function tanggal($dt,$with_timestamp=false){
 //format harus yyyy-mm-dd
 $bulan=array(
  "01" => "Januari",
  "02" => "Februari",
  "12" => "Desember",
  "03" => "Maret",
  "04" => "April",
  "05" => "Mei",
  "06" => "Juni",
  "07" => "Juli",
  "08" => "Agustus",
  "09" => "September",
  "10" => "Oktober",
  "11" => "November"
 );
 $date=explode("-",$dt);
 $tahun=substr($date[2],0,2); //fix date with timestamp format
 $tanggal=$tahun." ".$bulan[$date[1]]." ".$date[0];
 if($with_timestamp){
  $tanggal .= " ".substr($date[2],3);
 }
 return $tanggal;
}

function umur($tgl,$thnonly=false){
 $endperiod=mktime(0,0,0,7,1,2017);
 $bnperiod=date('U',strtotime($tgl));
 $thn=($endperiod-$bnperiod)/31556952; //detik perbedaan tanggal dibagi detik setahun. setahun ada 31556952 detik
 
 $bln=floor(($thn-floor($thn))*12); //tahun float dikurang floor tahun lalu dikali 12 bulan, dan di floor-kan
 if($thnonly){
  return floor($thn);
 } else {
  return floor($thn)." th ".$bln." bln";
 }
}


function akunlv($lv){
 $level=array(1=>'Operator','Administrator');
 return $level[$lv];
}

function specialRemove($string){
	//return preg_replace('/[^A-Za-z0-9*,.@\-\/\\/ \n]/', '', $string);
	return htmlspecialchars($string,ENT_QUOTES,'ISO-8859-1');
}

function uang($nominal){
 $nominal=preg_replace("/[.,a-zA-Z#!;=&]/","",$nominal);
 $nominal=(int)$nominal;
 return abs($nominal);
}

function show_rating($nilai){
 $rating_floor = floor($nilai);
  $rating_float = $nilai - $rating_floor;
 for($i=0;$i<$rating_floor;$i++)
  echo "<span class='fa fa-star'></span>";
 if($rating_float > 0)
  echo "<span class='fa fa-star-half-o'></span>";
 for($i=0;$i<5 - ceil($nilai);$i++)
  echo "<span class='fa fa-star-o'></span>";
}

function text_preview($text, $limit){
 $raw = explode('. ',strip_tags($text,"<p><a>"),$limit+1);
 unset($raw[$limit]);
 $join = implode('. ',$raw);
 return $join;
}

function youtube_parse($url){
 $return='';
 $parsed = parse_url($url);
 if($parsed != FALSE && $url != '' && isset($parsed['query'])){
  foreach(explode('&',$parsed['query']) as $args){
   $var = explode('=',$args);
   if($var[0] == 'v'){
    $return = $var[1];
   }
  }
 } else {
  $return = $url;
 }
 return $return;
}