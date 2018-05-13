<?php
include("functions/functions.php");
$id_ud = isset($_GET['id_ud']) ? clear_string($link, $_GET["id_ud"]) : '';
$action = isset($_GET['action']) ? clear_string($link, $_GET["action"]) : '';
$text = isset($_GET['text']) ? clear_string($link, $_GET["text"]) : '';
switch ($action) {
    case 'view':
        mysqli_query($link, "update stamp set stamp_history='$text' where id_stamp='$id_ud'");
        break;
    case 'delete':
        mysqli_query($link, "delete from stamp where id_stamp='$id_ud'");
        break;
}
?>
<div id="block-contenting" class="admin-container">
    <ul id="block-tovar-grid">
        <li id="new-stamp">
            <a href="annunview.php" >
                <div class="new-stamp-title">
                    Добавить марку
                </div>
            </a>
        </li> 

        <?php
        $result1 = mysqli_query($link, "SELECT
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
        if (mysqli_num_rows($result1) > 0) {
            $row1 = mysqli_fetch_array($result1);
            do {
                if ($row1["stamp_picture"] != "" && file_exists("./" . $row1["stamp_picture"])) {
                    $img_path = $row1["stamp_picture"];

                    $width = 300;
                    $height = 204;
                    $max_width = 300;
                    $max_height = 204;
                    list($width, $height) = getimagesize("./" . $img_path);
                    $ratioh = $max_height / $height;
                    $ratiow = $max_width / $width;
                    $ratio = min($ratioh, $ratiow);
                    $width = intval($ratio * $width);
                    $height = intval($ratio * $height);
                } else {

                    $img_path = "/img/no-image.png";
                    $width = 300;
                    $height = 204;
                }
                echo ' 
        

    <li class="admin-stamp-item">
        
        <div class="block-images-grid">
        <img src="' . $img_path . '" width="' . $width . '" height="' . $height . '"/>
        </div>
        <div class="admin-stamp-title">
            <a href="annunview.php?id_ud='.$row1["id_stamp"].'">' . $row1["stamp_name"] . ' </a>
            <div id="delete1"><a href="adminpanel.php?id_ud='.$row1["id_stamp"].'&action=delete">Удалить</a></div>
        </div>
        <div class="admin-stamp-info">
                <div class="admin-stamp-about">
                    <div class="stamp-about-info">
                        <p><span class="stamp-about-title">Страна:</span>' . $row1["country_name"] . '</p>
                        <p><span class="stamp-about-title">Категория:</span>' . $row1["category"] . '</p>
                        <p><span class="stamp-about-title">Год:</span>' . $row1["stamp_year"] . '</p>
                        <p><span class="stamp-about-title">Перфорация:</span>' . $row1["perforation"] . '</p>
                        <p><span class="stamp-about-title">Кол-во:</span>' . $row1["counts_in_world"] . '</p>    
                    </div>
                    <div class="stamp-about-price">' . $row1["cost"] . '</div>
                </div>
                <div class="stamp-description">
                ' . $row1["stamp_history"] . '
                </div>
            </div>

        
        </li>
';
            } while ($row1 = mysqli_fetch_array($result1));
        };
        ?>   
    </ul>

</div>     

