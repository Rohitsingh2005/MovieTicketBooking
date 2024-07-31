<?php
session_start();
$m=$_POST['a'];
$v1=$_GET['name'];
if($m=="")
{
	echo "Please select atleast one seat";
}
else
{
	mysql_connect("localhost","root","");
	mysql_select_db("movie");
	mysql_query("UPDATE customers SET seats='$m' WHERE name='$v1'");
	
}
?>