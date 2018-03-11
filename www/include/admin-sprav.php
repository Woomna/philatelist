<?php
include("functions/functions.php");
$id_ud=  isset($_GET['id_ud']) ? clear_string($link,$_GET["id_ud"]): '';
$action= isset($_GET['action']) ? clear_string($link,$_GET["action"]): '';
switch ($action)
{
  case 'deleteperf':
     mysqli_query($link,"delete from perforation where ID_perforation='$id_ud'");
  break;
  case 'deletecount':
     mysqli_query($link,"delete from country where ID_country='$id_ud'");
  break;
  case 'deletecateg':
     mysqli_query($link,"delete from category where id_category='$id_ud'");
  break;
}
if(isset($_POST["button-country"]))
{
$coun=  $_POST['coun']; 
mysqli_query($link,"insert into country (country_name) values ('{$coun}')");
}
if(isset($_POST["button-category"]))
{
$categ=  $_POST['categ']; 
mysqli_query($link,"insert into category (category) values ('{$categ}')");
}
if(isset($_POST["button-perforation"]))
{
$perf=  $_POST['perf']; 
mysqli_query($link,"insert into perforation (perforation) values ('{$perf}')");
}
?>


<div id="admin-tovar">
    
     <div id="admin-otrasl2">   
     <br>    <table>
     <tr>
          <td></td>
         <td>Название страны</td>
     </tr> 
     
   <?php
$result=  mysqli_query($link, "SELECT* from country");
 if (mysqli_num_rows($result)>0)
{
    $row=  mysqli_fetch_array($result);
do{
    echo ' 
    <tr> 
         <td>
              <div id="delete1"><a href="adminpanel-sprav.php?id_ud='.$row["ID_country"].'&action=deletecount">Удалить</a></div>                  
         </td>
         <td>'.$row["country_name"].'</td>
     </tr>
 ';  
}
 while($row=  mysqli_fetch_array($result));
 } ; 
?>   
 </table></div>
        
     
  <?php 

echo 
'
<br><form  method="post" >';
?>
  <form name="formcount" action="" method="post"  > 
      <?php
      echo '
    Страна<p><input type="text" id="coun" name="coun" placeholder="" class="inp" value=""></p>  
  
   <p><input class="tovar" type="submit" name="button-country" id="button-tovar" value="Сохранить страну"></p>'
            ?>
  </form>
 
   


        <div id="admin-otrasl">
         <table>
     <tr>
         
          <td></td>
         <td>Перфорация</td>
     </tr> 
     
   <?php
$result4=  mysqli_query($link,"SELECT * from perforation ");
 if (mysqli_num_rows($result4)>0)
{
    $row4=  mysqli_fetch_array($result4);
do{
    echo ' 
        
<br> 
     <tr> 
         <td> 
              <div id="delete1"><a href="adminpanel-sprav.php?id_ud='.$row4["ID_perforation"].'&action=deleteperf">W</a></div>  
         </td>
         <td>'.$row4["perforation"].'</td>
     </tr>
 ';  
}
 while($row4=  mysqli_fetch_array($result4));
 } ; 
?>   
 </table>
        
    </div>     

  <form name="formsect" action="" method="post" style="width: 800px;" > 
      <?php
      echo '<br>
 Перфорация<p><input type="text" id="perf" name="perf" placeholder="" class="inp" value=""></p>  

  
   <p><input class="tovar" type="submit" name="button-perforation" id="button-perforation" value="Сохранить перфорацию"></p>'
            ?>
  </form> 
 
   
  <div id="tablica">
      <form name="form" action="" method="post" style="width: 800px;" >
<?php
echo '<br>
<table>
     <tr>
         
          <td></td><br>
         <td>Категория</td>
     </tr> 
';
$category=  mysqli_query($link, "SELECT * FROM category order by category ");  
if (mysqli_num_rows($category)>0)
{
    $row5=  mysqli_fetch_array($category);
    do
        {
                 echo '
           <tr> 
         <td> 
              <div id="delete1"><a href="adminpanel-sprav.php?id_ud='.$row5["id_category"].'&action=deletecateg">W</a></div>
                  
         </td>
         <td>'.$row5["category"].'</td>
     </tr>

';

       
        }
    while($row5=  mysqli_fetch_array($category));
};

echo'
    </table>
    
    ';

?>
  </form>
  <form name="formprof" action="" method="post" style="width: 800px;" > 
      <?php
      echo ' <br>
    Категория<p><input type="text" id="categ" name="categ" placeholder="" class="inp" value=""></p>  
    
   <p><input class="tovar" type="submit" name="button-category" id="button-category" value="Сохранить категорию"></p>'
            ?>
  </form>

   
    
    

</div>

  </div>  