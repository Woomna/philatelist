<?php
include("functions/functions.php");
$id_ud = isset($_GET['id_ud']) ? clear_string($link, $_GET["id_ud"]) : '';
$action = isset($_GET['action']) ? clear_string($link, $_GET["action"]) : '';
switch ($action) {
    case 'deleteperf':
        mysqli_query($link, "delete from perforation where id_perforation='$id_ud'");
        break;
    case 'deletecount':
        mysqli_query($link, "delete from country where id_country='$id_ud'");
        break;
    case 'deletecateg':
        mysqli_query($link, "delete from category where id_category='$id_ud'");
        break;
}
if (isset($_POST["button-country"])) {
    $coun = $_POST['coun'];
    mysqli_query($link, "insert into country (country_name) values ('{$coun}')");
}
if (isset($_POST["button-category"])) {
    $categ = $_POST['categ'];
    mysqli_query($link, "insert into category (category) values ('{$categ}')");
}
if (isset($_POST["button-perforation"])) {
    $perf = $_POST['perf'];
    mysqli_query($link, "insert into perforation (perforation) values ('{$perf}')");
}
?>
<div class="admin-catalogs">
<div class="tabs">
    <ul class="tabs-list">
        <li class="tabs-item active" data-tab-link="countries">
            Страны
        </li>
        <li class="tabs-item" data-tab-link="categories">
            Категории
        </li>
        <li class="tabs-item" data-tab-link="perforation">
            Перфорация
        </li>
    </ul>
</div>
<?php
include("include/perforation-tab.php");
?>
<?php
include("include/countries-tab.php");
?>
<?php
include("include/categories-tab.php");
?>
</div>