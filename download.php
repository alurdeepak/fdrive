<?php

if(isset($_REQUEST['dcode'])){
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
    include 'openDB.php';
include 'dquestions.php';
//$GET_FILE=" select * from dat_upload_dtls where dcode='";
   date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time()); 

    
    //$GET_USR_DTLS="select id,userid,isEmp,last_login,last_login_ip,expiry_date from mas_users where userid='";
    $sql=$GET_FILE . $_REQUEST['dcode'] . "'";
   // echo $sql;
$result = mysql_query($sql) or die ("get file failed" . mysql_error());
$row=mysql_fetch_array($result);
    
    if(mysql_num_rows($result)>0){
        session_start();
    
       echo "<a style=font-size:50px href=".$_SESSION['domname'] ."/tmp/" . $row['fcode'] . "> Download </a>";
       // echo "<a".$_SESSION['domname'] ."/tmp/" . $row['fcode'] . "> Download </a>";
    }
    
    
}//if


?>