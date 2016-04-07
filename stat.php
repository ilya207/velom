<?php

$db = mysql_connect("localhost", "root");
mysql_select_db("velom",$db);

$query = mysql_query("select count(*) from zakaz") or die(mysql_error());

$query2 = mysql_query("select * from zakaz where idst=2") or die(mysql_error());

$query3 = mysql_query("select * from zakaz where idst<>2") or die(mysql_error());

$query4 = mysql_query("select sum(sumaz) from zakaz ") or die(mysql_error());

$query5 = mysql_query("select count(*) from klient ") or die(mysql_error());




$kz=mysql_num_rows($query );
$zz=mysql_num_rows($query2 );
$oz=mysql_num_rows($query3 );
$zap=mysql_num_rows($query5 );
$d=mysql_num_rows($query4 );

/*
while($row = mysql_fetch_array($query6))
    { 
	$sz=$row['0'];}
$sz2=$sz;

while($row = mysql_fetch_array($query7))
    { 
	$sg=$row['0'];}
	
	
	while($row = mysql_fetch_array($query8))
    { 
	$szz=$row['0'];}

$pr=$sz2-$sg -$szz;	*/



echo "

<table>
    <caption>Статистика</caption>
    <thead>
    <tr>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td>Доход   </td>
        <td>{$d}</td>
    </tr>
    </tfoot>
    <tbody>
    <tr>
        <td>Количество заявок</td>
        <td>{$kz}</td>
    </tr>
    <tr>
        <td>Количество завершенных заявок</td>
        <td>{$zz}</td>
    </tr>
	  <tr>
        <td>Количество заявок в работе</td>
        <td>{$oz}</td>
    </tr>
	  <tr>
        <td>Количество клиентов</td>
        <td>{$zap}</td>
    </tr>
    </tbody>
</table>";

?>
