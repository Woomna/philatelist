<div id="tovar-content">
<form name="form" action="" method="post">
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
    <div id="all">
    <div class="stamp">
        <div class="stamp-image">
            <a><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"></a>;
        </div>
        <div class="stamp-info">
            <div class="stamp-name">'.$row["stamp_name"].'</div>
            <div class="stamp-price">'.$row["cost"].' $. </div>
            <div class="stamp-main-info">
                <div><span class="stamp-text-title"> Страна: </span> '.$row["country_name"].'</div>
                <div><span class="stamp-text-title">  Год: </span>  '.$row["stamp_year"].'</div>
                <div><span class="stamp-text-title">  Кол-во:  </span> '.$row["counts_in_world"].'</div>
                <div><span class="stamp-text-title">  Перфорация: </span>  '.$row["perforation"].'</div>
                <div><span class="stamp-text-title">  Раритет:  </span> '.$row["raritet"].'</div>
            </div>
            <div class="stamp-descr">
                ';
                if($row["stamp_history"]!="") {
                    echo '<div class="stamp-story"> '.$row["stamp_history"].';</div>';
                }
                echo
                '
            </div>
        </div>
        </div>
    </div> ';
};

?> 
   
</form>
</div>
