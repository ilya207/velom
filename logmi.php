<?php
session_start(); ?>

<html>

<body>
<head>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<?php

/////текстовое поле
 $login = $_POST['login']; 
 $password = $_POST['password'];
$db = mysql_connect("localhost", "root");
mysql_select_db("velom",$db);


   
    $query = "SELECT * FROM sotr WHERE login='$login' AND pass='$password'";
 
$result = mysql_query($query) or die(mysql_error());
$number = mysql_num_rows($result);

	
    if ($number>0){
		$row = mysql_fetch_array($result);
		$_SESSION['user'] = $row['0'];
		$_SESSION['role'] = $row['4'];
	echo $_SESSION['user'];$_SESSION['vh']=0;
		
	} else {$_SESSION['vh']=-1;}

if ($_SESSION['vh']==-1) {$url="index.php";}
else {
	$url="index2.php";}
	

print 	$_SESSION['vh'];
print $url;
print 	$_SESSION['role'];

echo "<script>location.href='".$url."'</script>";

?>
</head>
</body>
</html>