<?php
function clear_string($link,$cl_str)
{
$cl_str=  strip_tags($cl_str);
$cl_str=  mysqli_real_escape_string($link,$cl_str);
$cl_str=trim($cl_str);
return $cl_str;
    
};
function addWhere($where1,$where, $add, $and = true) {
    if ($where) {
      if ($and) $where .= " AND $add";
      else $where .= " OR $add";
    }
    else $where = $add;
    if ($where1) 
    {
    $where1 .=" and $where";
    }
    else 
    {
     $where1 = " where $where ";   
    }
    return $where1;
  }
function isvalidemail($mail)
{
  if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($mail))){ return false; };
  return true;
};

function zap($FIO,$mail,$phone,$adress){

if(isvalidemail($mail)===false)
{
  echo '$("#mail").css("bordercolor","red")';
  $send_mail='0';
    
    
}
else
{
  echo '$("#mail").css("bordercolor","black")';
  $send_mail='1';
}
if($FIO===""||$FIO.length>50)
{
  echo '$("#FIO").css("bordercolor","red")';
 $send_FIO='0';
    
    
}
else
{
   echo '$("#FIO").css("bordercolor","black")';
  $send_FIO='1';
}
if($phone===""||$phone.length>50)
{
 echo '$("#phone").css("bordercolor","red")';
  $send_phone='0';
    
    
}
else
{
   echo '$("#phone").css("bordercolor","black")';
  $send_phone='1';
}
if($adress===""||$adress.length>50)
{
echo '$("#adress").css("bordercolor","red")';
  $send_adress='0';
    
    
}
else
{
  echo '$("#adress").css("bordercolor","black")';
  $send_adress='1';
}
if($send_adress==='1'&& $send_FIO==='1'&&$send_mail==='1')
{return true;}
return false;
};
?>