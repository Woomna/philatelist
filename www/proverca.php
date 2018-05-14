<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
 
?>

<!DOCTYPE HTML>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
	<title>Добро пожаловать на сайт</title>
        <meta http-equiv="Content-Style-Type" content="text/css">

</head>
<?php

setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');

if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
if (empty($login) or empty($password)) 
    {
    exit ("<body><div class='alert-text'>Вы ввели не всю информацию, вернитесь назад и заполните все поля!" . "<a href='login.php' class='back-href'> << Назад</a></div></body>");
    }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    $login = trim($login);
    $password = trim($password);

   include("include/db-connect.php");

$result = mysqli_query($link,"SELECT * FROM tbl_users WHERE username='$login'");
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow["password"]))
    {

    exit ("<body>
	<div class='alert-text'>введённый вами login или пароль неверный." . "<a href='login.php' class='back-href'> << Назад </a></div></body>");
    }
    else {

    if ($myrow["password"]==$password) {

    $_SESSION['login']=$myrow["username"]; 
    $_SESSION['id']=$myrow["id"];
    include("login.php");
    }
 else {

    exit ("<body><div class='alert-text'>введённый вами login или пароль неверный." . "<a href='login.php' class='back-href'> << Назад </a></div></body>");
    }
    }
    ?>

