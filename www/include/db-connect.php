<?php
$db_host='localhost';
$db_user='root';
$db_pass='';
$db_database='phil';

$link=  mysqli_connect($db_host, $db_user,$db_pass, $db_database);
$db_select = mysqli_select_db($link, $db_database);
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}
mysqli_set_charset($link, "utf8");

//mysqli_query($link,"SET names 'cp1251'");

?>


