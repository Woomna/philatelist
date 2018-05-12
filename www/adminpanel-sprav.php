<?php

 session_start();
 $ip= $_SERVER["REMOTE_ADDR"];
 include("include/db-connect.php");
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src='js/jquery-1.11.3.min.js'></script>
    <script type="text/javascript" src='js/tabs.js'></script>
	<title>Справочник филателиста</title>
</head>

<body>

<div id="block-body">

<?php
  include("include/block-header-admin.php");
?>
    
<?php
    include("include/admin-sprav.php");
?>
    


</div>

</body>
</html>
