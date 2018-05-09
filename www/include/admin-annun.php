<?php
include("functions/functions.php");
$id_ud=  isset($_GET['id_ud']) ? clear_string($link,$_GET["id_ud"]): '';
$action= isset($_GET['action']) ? clear_string($link,$_GET["action"]): '';
$text= isset($_GET['text']) ? clear_string($link,$_GET["text"]): '';
switch ($action)
{case 'view':   
  mysqli_query($link,"update stamp set stamp_history='$text' where id_stamp='$id_ud'");
     break;
  case 'delete':
     mysqli_query($link,"delete from stamp where id_stamp='$id_ud'");
     break;
      
}

?>



<div id="admin-zakaz">
   

    
  <div id="tablica">


 <table>
   <tr>
         
          <td></td>
         <td>Название марки</td>
         <td>Страна</td>
         <td>Год</td>
         <td>Категория</td>
         <td>Примерная стоимость, $</td>
         <td>История марки</td>
     </tr>   
   <?php
$result1=  mysqli_query($link,"SELECT
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
        INNER JOIN perforation ON perforation.id_perforation = stamp.id_perforation"); 
if (mysqli_num_rows($result1)>0)
{
    $row1=  mysqli_fetch_array($result1);
do{
    echo ' 
        

     <tr> 
         <td> 
              <div id="but-edit1"><a href="annunview.php?id_ud='.$row1["id_stamp"].'">W</a></div>
              <div id="delete1"><a href="adminpanel.php?id_ud='.$row1["id_stamp"].'&action=delete">W</a></div>
         </td>
  <td>  '.$row1["stamp_name"].'</td>
  <td>  '.$row1["country_name"].'</td>
  <td>  '.$row1["stamp_year"].'</td>  
  <td>  '.$row1["category"].'</td>
  <td>  '.$row1["cost"].'</td>
  <td> '.$row1["stamp_history"].'</td>
</td>
</tr>
';  
    
    

}
 while($row1=  mysqli_fetch_array($result1));
 } ; 
?>   
 </table>
        
    </div>     
       
 <div id="but-new"><a href="annunview.php" >Добавить марку</a></div>   
   
    
    

</div>
