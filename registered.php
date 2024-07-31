<?php
session_start();
$m=$_POST['a'];
$n=$_POST['b'];
$o=$_POST['c'];
$p=$_POST['d'];
$_SESSION['name'] = $m;
if($m==""||$n==""||$o==""||$p=="")
{
	echo "Plz fill all fields";
}
else
{
	mysql_connect("localhost","root","");
	mysql_select_db("movie");
	$query="SELECT * FROM customer WHERE name='$m' AND password='$p'";
	$result=mysql_query($query);
    $row=mysql_num_rows($result);
	if($row==0)
	{
		$query1="INSERT INTO customer VALUES ('$m','$n','$o','$p',0)";
		mysql_query($query1);
		header('location:main.html');
	}
	else
	{
		header('location:login.html');
    }
}
?>