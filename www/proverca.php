<?php

setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
if (empty($login) or empty($password)) 
    {
    exit ("<body><div align='center'><br/><br/><br/><h3>Вы ввели не всю информацию, вернитесь назад и заполните все поля!" . "<a href='login.php'> <b>Назад</b> </a></h3></div></body>");
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

    exit ("<body><div align='center'style='border: 2px solid #e5e5e5; height:150px; width:300px;'><br/><br/><br/>
	<font size='3' face='tahoma' color='484848'>введённый вами login или пароль неверный." . "<a href='login.php'> <b>�����</b> </a></h3></div></body>");
    }
    else {

    if ($myrow["password"]==$password) {

    $_SESSION['login']=$myrow["username"]; 
    $_SESSION['id']=$myrow["id"];
    include("login.php");
    }
 else {

    exit ("<body><div align='center'><br/><br/><br/>
	<h3>введённый вами login или пароль неверный." . "<a href='login.php'> <b>�����</b> </a></h3></div></body>");
    }
    }
    ?>

