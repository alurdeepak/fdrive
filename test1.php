<?php
error_reporting(-1);
ini_set('display_errors', 'On');
//set_error_handler("var_dump"); 
ini_set('SMTP','mail.oursawa.org');
ini_set('SMTPAuth',true);
ini_set('username','deepak@oursawa.org');
ini_set('password','alur@@16');
ini_set('sendmail_from','deepak@oursawa.org');
ini_set('smtp_port',26);


function getConfig(){
    //reads mas_config table and puts the domain name and port in session. This is needed for publishing the link.
    include 'openDB.php';
include 'dquestions.php';
//$GET_CONFIG="select id,config_var,var_value from mas_config";

$SQL_GET_CONFIG=$GET_CONFIG . " where config_var='dom_name'";
    
  
$result = mysql_query($SQL_GET_CONFIG) or die ("get configs failed" . mysql_error());
$row = mysql_fetch_array($result);
 //session_start();
    
    echo $row['var_value'];
        
//        mysql_close($result);
    
}//getConfig

//getConfig();


function mailCredentials($pwd){

 
$req= "deepak@oursawa.org";
    
$to = $_REQUEST['cemail'];
$subject = "T Drive: File Upload Credentials";

$message = "Test Msg";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: deepak@oursawa.org' . "\r\n";
//$headers .= 'Cc: $req' . "\r\n";

mail($to,$subject,$message,$headers);

    
}//mailCredentals

mailCredentials("xxx");
?>