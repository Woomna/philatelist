<?php
include("functions/functions.php");
include("actions/upload_image.php");
$idt = clear_string($link, $_GET["id_ud"]);
if (isset($_POST["button-tovar"])) {
    $cena = $_POST['cena'];
    $naim = $_POST['naim'];
    $counts = $_POST['counts'];
    $opis = $_POST['haract'];
    $year = $_POST['year'];
    $raritet1 = $chec;
//$raritet=($_POST['raritet']===true?1:0); 
    if (isset($_POST['raritet'])) {
        $raritet = 1;
    } else {
        $raritet = 0;
    }
  /*  if ($_POST['upload_image']) {
        $name = $_POST['upload_image'];
        $image = '/img/' . $name;
    } else
        $image = $_POST['old_image'];*/
    $dob = mysqli_query($link, "UPDATE Stamp set stamp_name ='{$naim}', stamp_year='$year', 
    stamp_history='{$opis}', cost='$cena', raritet='$raritet',  counts_in_world='$counts' where id_stamp=$idt");
    if ($dob=='TRUE') {
    echo '<script>window.location.href = "adminpanel.php";</script>';
    }
    else 
    {echo 'Error!';
    }
}
?>
<div id="block-tovar" > 


    <div id="tovar-content">


        <form name="form" action="" method="post" style="padding-top: 2%;" >

            <?php
            echo $raritet1;
            $result = mysqli_query($link, "SELECT
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
            
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $old_image=$row["stamp_picture"];
                if ($row["stamp_picture"] != "" && file_exists("./" . $row["stamp_picture"])) {
                    $img_path = $row["stamp_picture"];
                    $width = 200;
                    $height = 138;
                    $max_width = 500;
                    $max_height = 500;
                    list($width, $height) = getimagesize("./" . $img_path);
                    $ratioh = $max_height / $height;
                    $ratiow = $max_width / $width;
                    $ratio = min($ratioh, $ratiow);
                    $width = intval($ratio * $width);
                    $height = intval($ratio * $height);
                } else {
                    $img_path = "/img/no-image.png";
                    $width = 500;
                    $height = 500;
                }
                $chec = false; {
                    if ($row["raritet"] === '1') {
                        $chec = true;
                    } else {
                        $chec = false;
                    };
                }

                echo ' 
        <div class="edit-main-info">
            <div class="view-image">
                <img src="' . $img_path . '" width="' . $width . '" height="' . $height . '">
            </div>
            <div class="edit-info">
                    
                <div><span>Название:</span><input type="text" id="naim" name="naim" placeholder="" class="inp" value="' . $row["stamp_name"] . '"></div>
                    
                <div><span>Цена:</span><input type="text" id="cena" name="cena" placeholder="" class="inp" value="' . $row["cost"] . '"></div>
                <div><span>Кол-во:</span><input type="text" id="counts" name="counts" placeholder="" class="inp" value="' . $row["counts_in_world"] . '"></div>
                <div><span>Год:</span><input class="inp" type="text" name="year" id="year" value=' . $row["stamp_year"] . '></div>
                <div><span>Раритет:</span><input type="checkbox" name="raritet" value="' . $row["raritet"] . '"  ' . ($chec ? ' checked="checked"' : '') . ' /> </div>
                    <div><span>Страна:</span>' . $row["country_name"] . '</div>
                    <div><span>Категория:</span>' . $row["category"] . '</div>
                    <div><span>Перфорация:</span>' . $row["perforation"] . '</div>
            </div>
        </div>
        <div class="edit-description">
            <textarea name="haract" id="haract" placeholder="" class="inp1">' . $row["stamp_history"] . '</textarea>
        </div>
        <div class="button-save">
            <input class="tovar" type="submit" name="button-tovar" id="button-tovar" value="Сохранить марку">
        </div>
            
</form>
</div>
';
            }
            ?>     
    </div>






