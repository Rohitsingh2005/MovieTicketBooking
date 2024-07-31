<?php
session_start();
if(isset($_SESSION['name']))
{
$v1=$_GET['new'];
echo"<center><form method='POST' action=''>".$v1."<input type='number' name='a'><br><br>
<input type='submit' value='Save'></form></center>";
$val=$_POST['a'];
mysql_connect("localhost","root","");
mysql_select_db("movie");
mysql_query("UPDATE customer SET seats='$val' WHERE name='$v1'");
echo"<center><a href='logout.php'> LOGOUT </a></center>";
}
else
{
  echo "Seats updated";
}
?>