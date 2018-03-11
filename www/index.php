<?php
include("include/db-connect.php");
include("functions/functions.php");
  
    $where1="";
$sorting = isset($_GET['sort']) ? $_GET['sort'] : '';
 if(isset($_GET['cat'])&&$_GET['cat']==='1'){$cat="1"; }
 else {$cat="";};

switch($sorting)
{
    case 'cena-desc';
        $sorting='  ORDER BY cost desc';
        $sort_name='дорогие';
        break;
    case 'datapost';
        $sorting='  ORDER BY dat_add desc';
        $sort_name='новые';
        break;
    default: 
        $sorting='  ORDER BY stamp_name';
        $sort_name='по названию';
        break;
}
 if (!empty($_POST["button-sel"])) 
   {$where="";
    if (isset($_POST["country"])&&$_POST["country"]!='') $where1 = addWhere($where1, $where, " country.country_name  like ('%".$_POST["country"]."%')");
    if (isset($_POST["year"])&&$_POST["year"]!='') $where1 = addWhere($where1,$where, " stamp.stamp_year =".$_POST["year"].""); 
    if (isset($_POST["category"])&&$_POST["category"]!='') $where1 = addWhere($where1,$where, " category.category IN ('".$_POST["category"]."')");
    if (isset($_POST["perforation"])&&$_POST["perforation"]!='') $where1 = addWhere($where1,$where, " perforation.perforation IN ('".$_POST["perforation"]."')");
    $country_name=$_POST["country"];   
    $year_value=$_POST["year"];  
    $category_name=$_POST["category"];  
    $perforation_name=$_POST["perforation"];  
    
   }
else 
{
    $country_name="";
    $year_value="";  
    $category_name="";  
    $perforation_name=""; 
}

 if($cat)
      {$where="";
      $where1= addWhere($where1,$where," stamp.raritet=1 ");
      }
    
    if (!empty($_POST["button-search"])) {
    $where="";
    if (isset($_POST["search"])){$where1 = addWhere($where1, $where, 
            " stamp.stamp_name like ('%".$_POST["search"]."%') "
            . "OR category.category like ('%".$_POST["search"]."%') "
            . "OR country.country_name like ('%".$_POST["search"]."%')");};
            $search_value=$_POST["search"];
    }
    else $search_value=""; 
?>

<!DOCTYPE HTML>
<html>
<head>
   <meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">

    <link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>Справочник филателиста</title>
         
        <script type="text/javascript" src='js/jquery-1.11.3.min.js'></script>
       <script src="js/shop-script.js" type="text/javascript"></script>
        <script src="js/slides.min.jquery.js"></script>
        <script src="js/jsCarousel-2.0.0.js" type="text/javascript"></script>
            
    <link href="css/jsCarousel-2.0.0.css" rel="stylesheet" type="text/css" />




        <link rel="stylesheet" href="css/global.css">
        
        
</head>

<body style="background-color: #e1e8f0; margin:-10px;">

<div id="block-body">

<?php

  include("include/block-header.php");
?>

 <div id="all"> 
    <form name="form" action="" method="post" style="padding-top: 2%;" >
        
 <?php

echo 
'
Страна:

<select style="width:90px;"  name="country" size=1>
<option  value="'.$country_name.'">'.$country_name.'</option>
<option  value=""></option>
';
$country=  mysqli_query($link,"SELECT * FROM Country order by country_name"); 
if (mysqli_num_rows($country)>0)
{    $row2=  mysqli_fetch_array($country);
    do
        {
                 echo '
          <option style="width:90px; value="'.$row2["country_name"].' ">'.$row2["country_name"].'</option>
';
        }
    while($row2=  mysqli_fetch_array($country));
};

echo'
    </select>
Категория:

<select style="width:90px;"  name="category" size=1 />
<option  value="'.$category_name.'">'.$category_name.'</option>
<option  value=""></option>

';
$category=  mysqli_query($link,"SELECT * FROM category order by category"); 
if (mysqli_num_rows($category)>0)
{    $row2=  mysqli_fetch_array($category);
    do
        {
                 echo '
          <option style="width:90px; value="'.$row2["category"].' ">'.$row2["category"].'</option>
';
        }
    while($row2=  mysqli_fetch_array($category));
};

echo'
    </select>
<a>Год</a>
<input class="tovar" type="text" name="year" id="year" value="'.$year_value.'" style="background: white; color: black; cursor: text;border: 3px solid #e1e8f0; border-radius: 3px;">

     </select>
Перфорация:

<select style="width:90px;" name="perforation" size=1 />
<option  value="'.$perforation_name.'">'.$perforation_name.'</option>
<option  value=""></option>

';
$perforation=  mysqli_query($link,"SELECT * FROM perforation order by perforation"); 
if (mysqli_num_rows($perforation)>0)
{    $row2=  mysqli_fetch_array($perforation);
    do
        {
                 echo '
          <option style="width:90px; value="'.$row2["perforation"].' ">'.$row2["perforation"].'</option>
';
        }
    while($row2=  mysqli_fetch_array($perforation));
};

echo'
    </select>  
    <input class="tovar" type="submit" name="button-sel" id="button-sel" value="Искать" >
';
?>
    </form>    
     
    

<div id="block-contenting">
 <?php

 if($where1=='')
 { 
        $rescount=  mysqli_query($link,"SELECT
        COUNT(stamp.id_stamp) AS coun
        FROM stamp");
 
 }
     else
     {
            $rescount=  mysqli_query($link,"SELECT
            COUNT(stamp.id_stamp) AS coun
            FROM stamp
            LEFT JOIN country
            ON country.id_country = stamp.id_country
            INNER JOIN category
            ON category.id_category = stamp.id_category
            INNER JOIN perforation
            ON perforation.id_perforation = stamp.id_perforation
            $where1"); 
     }
$rowcount = mysqli_fetch_assoc($rescount); 
$kol= $rowcount['coun'];
    echo '
    <div id="text">
    <p>Найдено '.($kol).' марок</p>
    </div>';
?>    
<div id="sorting">
<p>Сортировка:</p>
<li><a id="select-sort"><p style="color:#9068be; font: 10px Tahoma; margin-top: 12px;"><?php echo $sort_name;?></p></a>  
           <ul id="sorting-list">
           <li><a href="index.php?sort=cena-desc">дорогие</a></li> 
           <li><a href="index.php?sort=datapost">новые</a></li> 
           <li><a href="index.php?sort=naim-desc">по названию</a></li>         
           </ul>
       </li> 

        
       
 </div>       
</div> 
     
 <script type="text/javascript">
function func()
{
$("#sorting-list").slideToggle(200);
       
}
var sor = document.getElementById('select-sort');

sor.onclick = function(){ func(); };
</script>   



<br>
 <br>

 
 
<ul id="block-tovar-grid">
<?php

$result=  mysqli_query($link,"SELECT
  perforation.perforation,
  country.country_name,
  category.category,
  stamp.stamp_name,
  stamp.stamp_year,
  stamp.stamp_picture,
  stamp.id_stamp
    FROM stamp
        LEFT JOIN country ON country.id_country = stamp.id_country
        INNER JOIN category ON category.id_category = stamp.id_category
        INNER JOIN perforation ON perforation.id_perforation = stamp.id_perforation $where1 $sorting");

if (mysqli_num_rows($result)>0)
{ 
    $row=  mysqli_fetch_array($result);
    do
        {
    if($row["stamp_picture"]!=""&&  file_exists("./".$row["stamp_picture"])) 
       {
         $img_path=$row["stamp_picture"];

        $width=200;
          $height=138;
          $max_width=200;
         $max_height=138;
         list($width,$height)=  getimagesize("./".$img_path);
         $ratioh=$max_height/$height;
         $ratiow=$max_width/$width;
         $ratio=min($ratioh, $ratiow);
         $width=intval($ratio*$width);
         $height=intval($ratio*$height);            
       }
 else {

       $img_path="/img/no-image.png";   
       $width=200;
       $height=138;
       }
        
           
        
       
        echo '
        
        <li>
        <div class="block-images-grid">
        <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/>
        </div>
        
        <li>
        <ul class="prewiews-and-counts-grid">
      
<p class="style-title-grid"><a href="annunciation.php?idt='.$row["id_stamp"].'">'.$row["stamp_name"].' </a></p>
<p class="vacancy"><br>'.$test.'</p>
</ul>

</li>
       

';
        }
    while($row=  mysqli_fetch_array($result));
};

?>
</ul>


 
    
    </div>
    
    

</div>
    

<div id="block-foot"><?php
  include("include/block-footer.php");

?></div>  
    

    
    
</body>
</html>