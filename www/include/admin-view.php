<?php
include("functions/functions.php");
include("actions/upload_image.php");
$idt= clear_string($link,$_GET["id_ud"]);
if(isset($_POST["button-tovar"]))
{
$cena=  $_POST['cena'];    
$naim=$_POST['naim'];    
$counts=$_POST['counts'];
$opis=  $_POST['haract'];  
$year=  $_POST['year']; 
$raritet1=$chec;
//$raritet=($_POST['raritet']===true?1:0); 
 if(isset($_POST['raritet'])) {$raritet=1;} else  {$raritet=0;}
if($_POST['upload_image'])
{
$name=$_POST['upload_image'];
$image='/img/'.$name;
}
else $image=$_POST['old_image'];
$dob=mysqli_query($link,"UPDATE Stamp set stamp_name ='{$naim}', stamp_year='$year', stamp_picture='{$image}',
    stamp_history='{$opis}', cost='$cena', raritet='$raritet',  counts_in_world='$counts' where id_stamp=$idt");
}

?>




<div id="block-tovar" > 
    
    
    <div id="tovar-content">
        
        <div id="lefty">
        
    <form name="form" action="" method="post" style="padding-top: 2%;" >
     
 <?php
  echo $raritet1;  
$result=  mysqli_query($link,"SELECT
  perforation.perforation,
  country.country_name,
  category.category,
  stamp.stamp_name,
  stamp.stamp_year,
  stamp.stamp_picture,
  stamp.id_stamp,
  stamp.cost,
  stamp.raritet,
  stamp.stamp_history,
  stamp.counts_in_world
    FROM stamp
        LEFT JOIN country ON country.id_country = stamp.id_country
        INNER JOIN category ON category.id_category = stamp.id_category
        INNER JOIN perforation ON perforation.id_perforation = stamp.id_perforation
WHERE id_stamp=$idt"); 
if (mysqli_num_rows($result)>0)
{
    $row=  mysqli_fetch_array($result);
    if($row["stamp_picture"]!=""&&  file_exists("./".$row["stamp_picture"])) 
       {
         $img_path=$row["stamp_picture"];
         $width=200;
          $height=138;
          $max_width=500;
         $max_height=500;
         list($width,$height)=  getimagesize("./".$img_path);
         $ratioh=$max_height/$height;
         $ratiow=$max_width/$width;
         $ratio=min($ratioh, $ratiow);
         $width=intval($ratio*$width);
         $height=intval($ratio*$height);            
       }
 else {
       $img_path="/img/no-image.png";   
       $width=500;
          $height=500;
       }
       $chec=false;
        { if($row["raritet"] === '1') {$chec=true;} else {$chec=false;};}
        
   echo ' 
       <div id="all" style="
   margin: 0 auto;
    width: 1000px;
    height: auto;
   background-color: white; 
}">
Название марки<p><input type="text" id="naim" name="naim" placeholder="" class="inp" value="'.$row["stamp_name"].'"></p>
<p><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"></p>
Изображение марки
<br>
<p><input type="text" id="old_image" name="old_image" placeholder="" class="inp" value="'.$row["stamp_picture"].'"></p>
<div id="baseimg-upload">
<input type="file" name="upload_image"/>
</div>
<br>
Примерная цена<p><input type="text" id="cena" name="cena" placeholder="" class="inp" value="'.$row["cost"].'"></p>
Количество в мире<p><input type="text" id="counts" name="counts" placeholder="" class="inp" value="'.$row["counts_in_world"].'"></p>  
Раритет<p><input type="checkbox" name="raritet" value="'.$row["raritet"].'"  '.($chec ? ' checked="checked"' : '').' /></p>
Страна:<p>'.$row["country_name"].'</p>
Категория:<p>'.$row["category"].'</p>
Перфорация:<p>'.$row["perforation"].'</p>
Год:<input class="tovar" type="text" name="year" id="year" value='.$row["stamp_year"].' style="background: white; color: black; cursor: text;border: 3px solid #e1e8f0; border-radius: 3px;"> 
<br/>

История марки<p> <textarea name="haract" id="haract" placeholder="" class="inp1">'.$row["stamp_history"].'</textarea></p> 


<p><input class="tovar" type="submit" name="button-tovar" id="button-tovar" value="Сохранить марку"></p>  
            
</form>
</div>
';
}
?>     
        
     
             
             
         </div>
        
        
        
        
    </div>


</div>



