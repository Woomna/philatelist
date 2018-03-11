<?php
  
 session_start();
 $ip= $_SERVER["REMOTE_ADDR"];
 include("include/db-connect.php");
?>


<!DOCTYPE HTML>
<html>
<head>
   
<link type="text/css" rel="stylesheet" href="css/tinyscrollbar.css"/>
<script type="text/javascript" src="js/jquery-1.6.2.min.js" ></script>
<script type="text/javascript" src="js/jquery.tinyscrollbar.min.js"></script>



    
	<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
	<title>Справочник филателиста</title>
</head>

<body style="background-color: #e1e8f0; margin:-10px;">

<div id="block-body">

<?php
  include("include/block-header-admin.php");
?>
    
<?php
    include("include/admin-annun.php");
?>
    


</div>

</body>
</html>
