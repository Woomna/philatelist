<?php

setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');
    session_start();//  ��� ��������� �������� �� �������. ������ � ��� �������� ������  ������������, ���� �� ��������� �� �����. ����� ����� ��������� �� �  ����� ������ ���������!!!
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //������� ��������� ������������� ����� � ���������� $login, ���� �� ������, �� ���������� ����������
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //������� ��������� ������������� ������ � ���������� $password, ���� �� ������, �� ���������� ����������
if (empty($login) or empty($password)) //���� ������������ �� ���� ����� ��� ������, �� ������ ������ � ������������� ������
    {
    exit ("<body><div align='center'><br/><br/><br/>    <font size='3' face='tahoma' color='e62739'>�� ����� �� ��� ����������, ��������� ����� � ��������� ��� ����!" . "<a href='login.php'> <b>�����</b> </a></div></body>");
    }
    //���� ����� � ������ �������,�� ������������ ��, ����� ���� � ������� �� ��������, ���� �� ��� ���� ����� ������
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
//������� ������ �������
    $login = trim($login);
    $password = trim($password);
	
     //������������ � ���� ������.
   include("include/db-connect.php");
 //��������� �� ���� ��� ������ � ������������ � ��������� �������
$result = mysql_query("SELECT * FROM tbl_users WHERE username='$login'", $link);
    $myrow = mysql_fetch_array($result);
    if (empty($myrow["password"]))
    {
    //���� ������������ � ��������� ������� �� ����������
    exit ("<body><div align='center'style='border: 2px solid #e62739; top:100px; margin-left:650px; height:150px; width:300px;'><br/><br/><br/>
	<font size='3' face='tahoma' color='e62739'>��������, �������� ���� login ��� ������ ��������." . "<a href='login.php'> <b>�����</b> </a></h3></div></body>");
    }
    else {
    //���� ����������, �� ������� ������
    if ($myrow["password"]==$password) {
    //���� ������ ���������, �� ��������� ������������ ������! ������ ��� ����������, �� �����!
    $_SESSION['login']=$myrow["username"]; 
    $_SESSION['id']=$myrow["id"];//��� ������ ����� ����� ������������, ��� �� � ����� "������ � �����" �������� ������������
    include("login.php");
    }
 else {
    //���� ������ �� �������

    exit ("<body><div align='center'><br/><br/><br/>
	<font size='3' face='tahoma' color='e62739'>��������, �������� ���� login ��� ������ ��������." . "<a href='login.php'> <b>�����</b> </a></div></body>");
    }
    }
    ?>

