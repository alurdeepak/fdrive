<?php
include 'openDB.php';
session_start();
date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());
//$UPD_ENTRY="update dat_logs set entry=";

if(isset($_REQUEST['dev'])){

$SQL_ADD_ENTRY="insert into dat_dev(devID) values ('" . $_REQUEST['dev'] . "')";

echo $SQL_ADD_ENTRY;
$result = mysql_query($SQL_ADD_ENTRY) or die ("insert request  failed" . mysql_error());

echo $result;

}

?>