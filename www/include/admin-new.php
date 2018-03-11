<?php
include("functions/functions.php");
include("actions/upload_image.php");

if(isset($_POST["button-tovar"]))
{
$cena=  $_POST['cena'];  
$country=$_POST['country'];    
$naim=$_POST['naim'];    
$counts=$_POST['counts'];
$category=$_POST['category'];
$perforation=$_POST['perforation'];
$opis=  $_POST['haract'];  
$year=  $_POST['year']; 
$raritet=($_POST['raritet']===true?1:0); 
if($_POST['upload_image'])
{
$name=$_POST['upload_image'];
$image='/img/'.$name;
}
else $image=''; 
$dob=mysqli_query($link,"INSERT INTO Stamp (stamp_name, stamp_year, stamp_picture, stamp_history, 
    cost, raritet,  counts_in_world, ID_country, id_category, ID_perforation)
                VALUES ('{$naim}', '$year', '{$image}', '{$opis}', "
                . "'$cena', '$raritet', '$counts', '$country', '$category', '$perforation')");
}
?>




<div id="block-tovar" > 
    
    
    <div id="tovar-content">
        
        <div id="lefty">
        
    <form name="form" action="" method="post" style="padding-top: 2%;" >
        
 <?php

echo 
'
Название марки<p><input type="text" id="naim" name="naim" placeholder="" class="inp" value=""></p>
Примерная цена<p><input type="text" id="cena" name="cena" placeholder="" class="inp" value=""></p>
Количество в мире<p><input type="text" id="counts" name="counts" placeholder="" class="inp" value=""></p>  
Раритет<p><input type="checkbox" name="raritet" value=""/></p>
Страна:
<select style="width:90px;"  name="country" size=1>
';
$country=  mysqli_query($link,"SELECT * FROM Country order by country_name"); 
if (mysqli_num_rows($country)>0)
{    $row2=  mysqli_fetch_array($country);
    do
        {
                 echo '
          <option selected=true value="'.$row2["ID_country"].'">'.$row2["country_name"].'</option>
';
        }
    while($row2=  mysqli_fetch_array($country));
};

echo'
    </select>
Категория:

<select style="width:90px;"  name="category" size=1 />

';
$category=  mysqli_query($link,"SELECT * FROM category order by category"); 
if (mysqli_num_rows($category)>0)
{    $row3=  mysqli_fetch_array($category);
    do
        {
                 echo '
          <option selected=true value="'.$row3["id_category"].' ">'.$row3["category"].'</option>
';
        }
    while($row3=  mysqli_fetch_array($category));
};

echo'
    </select>
<a>Год</a>
<input class="tovar" type="text" name="year" id="year" value="'.$year_value.'" style="background: white; color: black; cursor: text;border: 3px solid #e1e8f0; border-radius: 3px;">

     </select>
Перфорация:

<select style="width:90px;" name="perforation" size=1 />

';
$perforation=  mysqli_query($link,"SELECT * FROM perforation order by perforation"); 
if (mysqli_num_rows($perforation)>0)
{    $row4=  mysqli_fetch_array($perforation);
    do
        {
                 echo '
          <option selected=true value="'.$row4["ID_perforation"].' ">'.$row4["perforation"].'</option>
';
        }
    while($row4=  mysqli_fetch_array($perforation));
};

echo'
    </select>  
    <br/>

История марки<p> <textarea name="haract" id="haract" placeholder="" class="inp1"></textarea></p> 
Изображение марки
<br>
<div id="baseimg-upload">
<input type="file" name="upload_image"/>
</div>
<br>

<p><input class="tovar" type="submit" name="button-tovar" id="button-tovar" value="Сохранить марку"></p>  
            
</form>
</div>
';

?>     
        
     
             
             
         </div>
        
        
        
        
    </div>


</div>



