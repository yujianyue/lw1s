<?php 


 class MyDB extends SQLite3 {function __construct($dbfile) {$this->open($dbfile);}}


function webalert($Key){
 $html="<script>\r\n";
 $html.="alert('".$Key."');\r\n";
 $html.="history.go(-1);\r\n";
 $html.="</script>";
 exit($html);
}


function characet($data){
  if(!empty($data) ){    
    $fileType = mb_detect_encoding($data , array('UTF-8','GBK','LATIN1','BIG5')) ;   
    if( $fileType != 'UTF-8'){   
      $data = mb_convert_encoding($data ,'utf-8' , $fileType);   
    }   
  }   
  return $data;    
}

function charaget($data){
  if(!empty($data) ){    
    $fileType = mb_detect_encoding($data , array('UTF-8','GBK','LATIN1','BIG5')) ;   
    if( $fileType != 'GBK'){   
      $data = mb_convert_encoding($data ,'GBK' , $fileType);   
    }   
  }   
  return $data;    
}

Function rephtmls($Keys){
$Keys = str_replace(array(" "), "&nbsp;", $Keys); 
$Keys = str_replace(array("\""), "&quot;", $Keys); 
$Keys = str_replace(array("<"), "&lt;", $Keys); 
$Keys = str_replace(array(">"), "&gt;", $Keys); 
$Keys = str_replace(array("\r\n", "\r", "\n"), "<br>", $Keys); 
  return $Keys;
}


?>