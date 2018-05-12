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

<body >
    <div id="block-header">
    <div id="header-menu-block">
        <div class="header-logo-menu">
            <a href="index.php">  <div id="img-log"></div></a>
            <div class="header-menu-list">
                <a href="index.php" class="menu-item">Главная</a> 
                <a href="index.php?cat=1" class="menu-item">Раритеты</a> 
            </div>
        </div>
        <form name="form-search" action="index.php" method="post" >
            <input  type="text" name="search" id="search" value="" placeholder="поиск марок" />
            <input  type="submit" name="button-search" id="button-search" value=" " />
        </form>

    </div>
        </div>
    <div id="all">
<?php

    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
  include("include/block-login.php");
    }
    else   
    {
		 $login=$_SESSION['login'];
		 

include("include/db-connect.php");

$sqlCart = mysqli_query($link,"SELECT username FROM tbl_users WHERE username = '$login'");

 while($row = mysqli_fetch_array($sqlCart)) 
 {

$name = $row["username"];
  }
  	//mysql_close($dbcon);
        mysqli_close($link);

    echo "
<div class='alert-text'>

        Здравствуйте: <b>".$name."</b></font>
            <div class='buttons'>
      <a href='viiti.php' class='black-href'> << ВЫЙТИ </a> 
      <a href='adminpanel-sprav.php' class='back-href'>АДМИН.ПАНЕЛЬ >> </a>
      </div>

      
   <br/>

</div>";
    }
    ?> 

</div>

   <div id="block-foot"><?php
  include("include/block-footer.php");

?></div>  

</body>
</html>

