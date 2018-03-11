<div id="tovar-content">
<form name="form" action="" method="post" style="width: 900px;" >
    
    <?php
include("include/db-connect.php");
include("functions/functions.php");
$idt= clear_string($link,$_GET["idt"]);
$s = isset($_POST['sizzes']) ? $_POST['sizzes'] : '';

$result=  mysqli_query($link,"SELECT
  perforation.perforation,
  country.country_name,
  category.category,
  stamp.stamp_name,
  stamp.stamp_year,
  stamp.stamp_picture,
  stamp.id_stamp,
  stamp.cost,
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
   echo ' 
       <div id="all" style="
   margin: 0 auto;
    width: 1000px;
    height: auto;
   background-color: white; 
}">
    <p class="skidok1"> '.$row["stamp_name"].' ,страна '.$row["country_name"].' , '.$row["raritet"].' Примерная стоимость '.$row["cost"].' $. </p>
      
     <div id="nazva">'.$row["stamp_year"].'г.в., в мире примерно '.$row["counts_in_world"].' шт., перфорация '.$row["perforation"].'</div>
<div id="opis">
<a><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"></a>;  
';
 if($row["stamp_history"]!="") echo'<p> История марки: '.$row["stamp_history"].';</p>';

 echo
 '
</div> </div> 
       

';
};

?> 
   
</form>
</div>
