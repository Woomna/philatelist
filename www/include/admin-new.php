<?php
include("functions/functions.php");
include("actions/upload_image.php");

if (isset($_POST["button-tovar"])) {
    $cena = $_POST['cena'];
    $country = $_POST['country']; echo 'country='; echo $country; echo $_POST['country']; 
    $naim = $_POST['naim'];
    $counts = $_POST['counts'];
    $category = $_POST['category']; echo '$category=';echo $category;
    $perforation = $_POST['perforation'];echo '$perforation=';echo $perforation;
    $opis = $_POST['haract'];
    $year = $_POST['year'];
    $raritet = ($_POST['raritet'] === true ? 1 : 0);
    if ($_POST['upload_image']) 
        {
        $name = $_POST['upload_image'];
        $image = '/img/' . $name;
        echo $image;
        } 
    else        
        { $image = ''; echo '33';
        }
    $dob = mysqli_query($link, "INSERT INTO Stamp (stamp_name, stamp_year, stamp_picture, stamp_history, 
    cost, raritet,  counts_in_world, id_country, id_category, id_perforation)
                VALUES ('{$naim}', '$year', '{$image}', '{$opis}', "
            . "'$cena', '$raritet', '$counts', '$country', '$category', '$perforation')");
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

        <div id="lefty">

            <form name="form" action="" method="post" style="padding-top: 2%;" >

                <?php
                echo $name;
                echo
                '
    <div class="edit-main-info">
            <div class="edit-image  new-image">
                <div id="baseimg-upload">
<input type="file" name="upload_image"/>
</div>
</div>
            <div class="edit-info">
                    
                <div><span>Название:</span><input type="text" id="naim" name="naim" placeholder="" class="inp" value=""></div>
                    
                <div><span>Цена:</span><input type="text" id="cena" name="cena" placeholder="" class="inp" value=""></div>
                <div><span>Кол-во:</span><input type="text" id="counts" name="counts" placeholder="" class="inp" value=""></div>
                <div><span>Год:</span><input class="inp" type="text" name="year" id="year" value=""></div>
                <div><span>Раритет:</span><input type="checkbox" name="raritet" value=""  ' . ($chec ? ' checked="checked"' : '') . ' /> </div>
                <div><span>Страна:</span>
                <div class="select-cont">
                    <select  name="country" size=1>
';
                $country = mysqli_query($link, "SELECT * FROM country order by country_name");
                if (mysqli_num_rows($country) > 0) {
                    $row2 = mysqli_fetch_array($country);
                    do {
                        echo '
          <option selected=true value="' . $row2["ID_country"] . '">' . $row2["country_name"] . '</option>
';
                    } while ($row2 = mysqli_fetch_array($country));
                };
                echo'
    </select>
    </div>
                </div>
                <div><span>Категория:</span>
                <div class="select-cont">
                    <select  name="category" size=1 />

';
                $category = mysqli_query($link, "SELECT * FROM category order by category");
                if (mysqli_num_rows($category) > 0) {
                    $row3 = mysqli_fetch_array($category);
                    do {
                        echo '
          <option selected=true value="' . $row3["id_category"] . ' ">' . $row3["category"] . '</option>
';
                    } while ($row3 = mysqli_fetch_array($category));
                };

                echo'
    </select>
    </div>
                </div>
                <div><span>Перфорация:</span>
                <div class="select-cont">
                <select name="perforation" size=1 />

';
                $perforation = mysqli_query($link, "SELECT * FROM perforation order by perforation");
                if (mysqli_num_rows($perforation) > 0) {
                    $row4 = mysqli_fetch_array($perforation);
                    do {
                        echo '
          <option selected=true value="' . $row4["ID_perforation"] . ' ">' . $row4["perforation"] . '</option>
';
                    } while ($row4 = mysqli_fetch_array($perforation));
                };

                echo'
    </select>  </div></div>
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
                ?>     




        </div>




    </div>


</div>



