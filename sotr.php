<?php
include 'gl.php';
if ($_SESSION['role']==0) { 
$url="index.php";
echo "<script>location.href='".$url."'</script>";

}

$link = mysql_connect("localhost", "root", "") or die ("Нет соединения с хостом");
mysql_query("SET NAMES utf8");
mysql_query('SET CHARACTER SET utf8');
mysql_query('SET COLLATION_CONNECTION="utf8_general_ci"');
mysql_select_db ("velom");
$query = mysql_query("SELECT * FROM sotr ") or die(mysql_error());
$number = mysql_num_rows($query );


 if ($number == 0) {echo "<CENTER>Нет данных для корреции</CENTER>";} 

echo "<table class='sample'><tr><td align='center'>Логин</td><td align='center'>Пароль</td><td align='center'>ФИО сотрудника</td><td align='center'>Роль</td><td width='70px'></td></tr>";
while($row = mysql_fetch_array($query))
    { 

echo "  <tr><form method='post' action=''>
                <td><input name='id' type='hidden' value='". $row['0'] ."'> 
				<input name='log2' maxlength=30 size=20 value='". $row['1'] ."' type=text></td>
                <td><input name='pass2' maxlength=10 size=17 value='". $row['2'] ."' type=text></td>
		<td><input name='fio2' maxlength=30 size=30 value='". $row['3'] ."' type=text></td>
	<td>";
	if ($row['4']==0) {	echo "<input type='radio' name='option1' value='0' checked>Механик<Br>
	 <input type='radio' name='option1' value='1'>Администратор</td>";
	
	} else {echo "<input type='radio' name='option1' value='0' >Механик<Br>
	 <input type='radio' name='option1' value='1' checked>Администратор</td>";}
	
echo "<td>  <input name='red' type='submit' class='sendsubmitred' value='Редактировать'>
    <input name='del' type='submit' class='sendsubmitdel'  value='Удалить'></td></form>
           
	";

};




echo "</select>";
 

     

echo "</center>";
echo "</p><br>";

 echo "<form method='post' action=''>";
 echo "<br>Введите логин <input name='log' maxlength=50 size=50 value='' type=text>";
 echo "  Введите пароль <input name='pass' maxlength=10 size=10 value='' type=text>";
 echo "<p>Введите ФИО <input name='fio' maxlength=120 size=95 value='' type=text>";
echo "<br> <input name='rol' type='radio' value=0 'checked'>Механик
  <input name='rol' type='radio' value=1> Администратор ";
  
 echo "<input name='sav' type='submit' class='sendsubmitsave'  value='Сохранить'>";
 echo "</form>";




 
 
 if ( isset ( $_POST['del'] )){
	
	 
	 $sql1 =mysql_query ("DELETE FROM `sotr` WHERE ids='".$_POST['id']."'");
 $url = $_SERVER['REQUEST_URI']; echo "<script>location.href='".$url."'</script>"; }
     elseif ( isset ( $_POST['sav'] ))
     {	 

       $sql2 =mysql_query ("insert into sotr (login,pass,sotr,role)  values ('". $_POST['log']."', '". $_POST['pass']."', '". $_POST['fio']."','". $_POST['rol']."') ");
         
echo "insert into sotr (login,pass,sotr,role)  values ('". $_POST['log']."', '". $_POST['pass']."', '". $_POST['fio']."','". $_POST['rol']."') ";
			 if($sql2 == false){     echo "неполучилось";} 
              else { $url = $_SERVER['REQUEST_URI']; echo "<script>location.href='".$url."'</script>";  /* Перенаправляемся на страницу редактирвоания сбрасывая переменные $_POST['del'] и/или $_POST['red']   */}


}
else {
	

if ( isset ( $_POST['red'] )){
$sql2 =mysql_query ("UPDATE sotr SET login='". $_POST['log2']."', pass= '". $_POST['pass2']."', sotr= '". $_POST['fio2']."',role='". $_POST['option1']."' WHERE ids='".$_POST['id']."'");
  
 if($sql2 == false){     echo "неполучилось";} 
              else { $url = $_SERVER['REQUEST_URI']; echo "<script>location.href='".$url."'</script>";}

			  
}
}




/*include 'gl2.php';
*/

?>