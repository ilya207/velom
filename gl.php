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
	
	<?php   if ($_SESSION['role']==0)  {echo "</div><center>";}
	?>
	
      <div class="logo">
        <h1><a href="#">Учет <span>заказов</span></a> <small> документы веломастерской</small></h1>
      </div>




   
	  
	   
  
    <div class="clr"></div>
      <div class="menu_nav">
        <ul>
   <?php 

 

		
   if ($_SESSION['role']==0) 	{
     echo "
             <li class='active'><a href='#'>Добавить заказ</a></li>
          <li><a href='#'>Принятые</a></li>
          <li><a href='#'>В работе</a></li>
          <li><a href='#'>В ожидании</a></li>
          <li><a href='#'>Выполненные</a></li> 
		  <li><a href='#'>Склад</a></li> 
   <li><a href='#'>Клиенты</a></li>
<li><a href='out.php?act=logout'>Выйти</a></li>   ";}
   
   else {
	   
	    echo "<li class='active'><a href='sotr.php'>Сотрудники</a></li>
          <li><a href='#'>Услуги</a></li>
          <li><a href='#'>Запчасти</a></li>
          <li><a href='#'>Состояние склада</a></li>
		  <li><a href='out.php?act=logout'>Выйти</a></li>";
   }
		   echo "<li><strong> ";
	


$logged = $_SESSION['user'];
$db = mysql_connect("localhost", "root");
mysql_select_db("velom",$db);

$query = "SELECT * FROM sotr WHERE ids='$logged'";
$result = mysql_query($query) or die(mysql_error());
$number = mysql_num_rows($result);

if ($number==0) { 
	
	$url='index.php';
echo "<script>location.href='".$url."'</script>";
	}
 
else {
	$row = mysql_fetch_array($result); 

	echo $row['3'];
	echo ', добро пожаловать!'  ;}
	
	
?>


  
  
  
  </strong>
    </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
 
	   

   
	   
     
	 
	 
     
</body>
</html>
