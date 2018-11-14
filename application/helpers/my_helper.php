<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
if (!function_exists('stripUnicode'))
{
    function stripUnicode($str){
      if(!$str) return false;
       $unicode = array(
          'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
          'd'=>'đ',
          'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
          'i'=>'í|ì|ỉ|ĩ|ị',
          'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
          'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
          'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
       );
    foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
    return $str;
    }
}
    if (!function_exists('getAge'))
{
    function getAge($birthdate = '0000-00-00') {
    if ($birthdate == '0000-00-00') return 'Unknown';
  
    $bits = explode('-', $birthdate);
    if ($bits[0] != '') {
      $age = date('Y') - $bits[0] - 1;
    
      $arr[1] = 'm';
      $arr[2] = 'd';
      for ($i = 1; $i < count($arr); $i++) {
        $n = date($arr[$i]);
        if ($n < $bits[$i])
            break;
        if ($n > $bits[$i]) {
            ++$age;
            break;
        }
      }
    }else{
      $age =0;
    }
    
    return $age;
}
}
?>