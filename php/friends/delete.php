<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{
  
$q = strval($_POST['q']);

include '../connect.php';

$sqlid_1 = "SELECT FDS_USER_ID_1 FROM FRIENDS WHERE FDS_ID = '".$q."'";
$id_1 = mysql_result(mysql_query($sqlid_1), 0);

$sqlemail = "SELECT EMAIL FROM user WHERE ID = '".$id_1."'";
$email = mysql_result(mysql_query($sqlemail), 0);

$sqlid_2 = "SELECT FDS_USER_ID_2 FROM FRIENDS WHERE FDS_ID = '".$q."'";
$id_2 = mysql_result(mysql_query($sqlid_2), 0);  

$sql = "DELETE FROM FRIENDS WHERE FDS_USER_ID_1 = '".$id_2."' AND FDS_USER_ID_2 = '".$id_1."'";
mysql_query($sql);

$sql = "DELETE FROM FRIENDS WHERE FDS_ID = '".$q."'";
mysql_query($sql);

echo $email;

mysql_close($con);
}
?> 