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

<body style="background-color: #e1e8f0; margin:-10px;">
    <div id="block-body1">
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
<div align='center'style='border: 2px solid #e5e5e5; position:relative; top:100px; left:350px; height:150px; width:300px;'>
        <br><br>
	<font size='3' face='tahoma' color='484848'>
        Здравствуйте: <font size='3' face='tahoma' color='9da411'><b>"."".$name."</b></font>
	<br/>
	Вы можете перейти по ссылке: <a href='adminpanel-sprav.php'><br>-АДМИН.ПАНЕЛЬ-</a>
	<br/>
      <a href='viiti.php'>-ВЫЙТИ-</a> </font>
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

