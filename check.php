<?php
$m=$_POST['a'];
$n=$_POST['b'];
$_SESSION['name']=$m;
if($m==""||$n=="")
{
	echo "Plz fill all fields";
}
else{
    mysql_connect("localhost","root","");
	mysql_select_db("movie");
    if($_SESSION['name']=="admin")
    {
        $query1="SELECT * FROM admin WHERE name='$m' AND password='$n'";
        $result1=mysql_query($query1);
	    $query="SELECT * FROM customer";
	   $result= mysql_query($query);
		echo"<table border='6' width='75%' style='background-color:gray;color:white'>";
	    echo"<tr height='5'>";
		echo"<td width='20%'>NAME</td>";
		echo"<td width='20%'>EMAIL</td>";
		echo"<td width='20%'>PHONE</td>";
		echo"<td width='20%'>PASSWORD</td>";
		echo"<td width='20%'>SEATS</td>";
		echo"</tr>";
        echo"</table>";	
        while($row=mysql_fetch_array($result))
        {
		echo"<table border='1' width='75%' style='background-color:lightgray;color:white'>";
	    echo"<tr height='5px'>";
		echo"<td width='20%'>".$row[0]."</td>";
		echo"<td width='20%'>".$row[1]."</td>";
		echo"<td width='20%'>".$row[2]."</td>";
		echo"<td width='20%'>".$row[3]."</td>";
		echo"<td width='20%'>".$row[4]."&nbsp<a href='update.php?new=$row[0]'>Update</a></td>"; //<input type='hidden' name='' value=''> using form 
		echo"</tr>";
	    echo"</table>";
        }
        echo "<center><a href='logout.php'>LOGOUT</center>";
}
    else{
	$query="SELECT * FROM customer WHERE name='$m' AND password='$n'";
	$result=mysql_query($query);
    $row=mysql_num_rows($result);
	if($row!=0)
    {
        header('location:main.html');
    }
    else
    {
       echo "<center>User Name or password mismatch <br><br></center>";
       echo "<center><a href='login.html'>Click here to go back to login page </a></center>";
    }
}
    }
?>
