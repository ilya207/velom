<?php session_start();?>

<html>

 
<head>
<title>Автоматизация работы с документами веломастерской</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
</head>
<body>


	<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="#">Учет <span>заказов</span></a> <small> документы веломастерской</small>





   
	  
	   
   </div>

      <div class="clr"></div>
      <div class="menu_nav">
        <ul>

          <li class="active"><a href="#">Справка</a></li>
        <li><a href="out.php?act=logout">Выйти</a></li>
		  <li><center><strong>
		  <?php

require_once('auth.php');

$logged = $_SESSION['user'];
$db = mysql_connect("localhost", "root");
mysql_select_db("velom",$db);

$query = "SELECT * FROM sotr WHERE ids='$logged'";
$result = mysql_query($query) or die(mysql_error());
$number = mysql_num_rows($result);

if ($number==0) {
	
 echo "<form method='post' action='logmi.php'>";
 echo "   Логин   <input type=text size=15 maxlength=20 name='login' />";
 echo "    Пароль    <input type='password' size=15 maxlength=20 name='password' />";
 echo " <input type='submit' value='Войти' /> </form>";
 if ($_SESSION['vh']<0) { echo "<SCRIPT LANGUAGE=javascript>alert('Не верный логин или пароль')</SCRIPT";}
 }
else {
	$row = mysql_fetch_array($result); 
$_SESSION['role']=$row['4'];
	echo $row['3'];
	echo  ", добро пожаловать!!! " ;}

?>
       </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>

  <div class="content">
    <div class="content_resize"> <img src="images/hbg_img.jpg" width="948" height="295" alt="" class="hbg_img" /> 
      <div class="clr"></div>
      <div class="mainbar">
        <div class="article">
          <h2><span>Отчет о деятельности</span> веломастерской</h2>
          <div class="clr"></div>
          <p class="infopost">Сформирован <span class="date">
		   <script language="javascript" type="text/javascript"><!--
var d = new Date();

var day=new Array("Воскресенье","Понедельник","Вторник",
"Среда","Четверг","Пятница","Суббота");

var month=new Array("января","февраля","марта","апреля","мая","июня",
"июля","августа","сентября","октября","ноября","декабря");

document.write(day[d.getDay()]+" " +d.getDate()+ " " + month[d.getMonth()]
+ " " + d.getFullYear() + " г.");
//--></script>
		  
		  </span> размещен <a href="#">Администратор</a> &nbsp;&nbsp; </p>
  
  
	   
	  
<style type="text/css">
    table {
        border-collapse: collapse;
    }
    table th,
    table td {
        padding: 0 3px;
    }
    table tr td:last-child {
        text-align: right;
    }
    table tbody {
        border-top: 1px solid #000;
        border-bottom: 1px solid #000;
    }
</style>



<?php include "stat.php" ;
?>
    
        </div>
      
       </div>
	   

   
	   
     <div class="sidebar">
       
        <div class="clr"></div>
        <div class="gadget">
		


          <h2 class="star"><span>Главное</span> Меню</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <li><a href="#">Главная</a></li>
            <li><a href="#">Справочники</a>
			</li>
            <li><a href="#">Учет заявок</a></li>
            <li><a href="#">Склад</a></li>
            <li><a href="#">Отчеты</a></li>
            <li><a href="out.php?act=logout">Выйти</a></li>
          </ul>
        </div>
       
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
     
      <div class="col c3">
        <h2><span>Контакты</span></h2>
        <p>В случае возникновения проблем, обращатся к Администратору</p>
        <p><a href="#">support@yoursite.com</a></p>
        <p>+1 (123) 444-5677<br />
          +1 (123) 444-5678</p>
        <p></p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">Copyright &copy; <a href="#">Веломастерская</a>. All Rights Reserved</p>
      
      <div class="clr"></div>
    </div>
  </div>
</div>
</body>
</html>
