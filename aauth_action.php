<?php


if(strpos($_REQUEST['nid'],'@')){
 //authenticate with DB  as it means user is NOT employee 
    
    authenticateUser(); 
    
}

if(strpos($_REQUEST['nid'],'@technologiaworld.com') || strpos($_REQUEST['nid'],'@technologia.net')){
//authenticate with AD
    
include (dirname(__FILE__) . "/adLDAP/src/adLDAP.php");
try {
    $adldap = new adLDAP();
}
catch (adLDAPException $e) {
    echo $e;   
}

	$result= $adldap->authenticate($_REQUEST['nid'],$_REQUEST['npwd']);

if($result){
  echo "true";
    //user authentication passes with AD
 updateLoginInfo();
    session_start();
    
    
    
     $sfurl="Location: /landing1.php";
	header($sfurl);
}else{
    echo "false";
    //user authentication FAILED with AD
    session_start();
    $_SESSION['msg']="Invalid Credentials.";
        $sfurl="Location: /index.php";
	header($sfurl);
}//else

}

function updateLoginInfo(){
   //1. check if the entry exists for the username. If yes, update audit info else create a new row
    
    if(checkUserExists()){
        //user entry exists so call update for audit info
        updateUserAuditInfo();
        
    }else{
        
        //user entry DOENOT exist, so create row
        CreateUserEntry();
    }
    
}

function checkUserExists(){
 //this returns true if entry exists for username in mas_users table
    session_start();
include 'openDB.php';
include 'dquestions.php';
//$ADD_SERVICE="insert into dat_services(thing_id_fk,service_name,description,isenabled,created_on) values(";


    
    //$GET_USR_DTLS="select id,userid,isEmp,last_login,last_login_ip,expiry_date from mas_users where userid='";
    $sql=$GET_USR_DTLS . $_REQUEST['nid']. "'";
   // echo $sql;
$result = mysql_query($sql) or die ("get user info  failed" . mysql_error());

if(mysql_num_rows($result)>0){
    $row = mysql_fetch_array($result);
     session_start();
    $_SESSION['uid']=$row['id'];
    $_SESSION['uname']=$row['userid'];
    getConfig();
    //echo "user exists";
    return true;
    
}else{
    echo "user DOESNOT  exists";
    return false;
}
    
}//checkUserExists()

function updateUserAuditInfo(){
    include 'openDB.php';
include 'dquestions.php';
   date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time()); 
   // $UPD_USR_DTLS="update mas_users set";
    $sql= $UPD_USR_DTLS . " last_login='" . $today . "',last_login_ip='" .$_SERVER['REMOTE_ADDR'] . "' where userid='" . $_REQUEST['nid'] . "'";
    $result = mysql_query($sql) or die ("update user info  failed" . mysql_error());
    if($result){
    return true;
}else{
    return false;
}
    
}//updateUserAuditInfo

function CreateUserEntry(){
    include 'openDB.php';
include 'dquestions.php';
   date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time()); 
    //$ADD_USR_DTLS="insert into mas_users(userid,isEmp,last_login,last_login_ip,expiry_date) values('";
    $date = new DateTime('now');
    $sql=$ADD_USR_DTLS. $_REQUEST['nid']. "',1,'" . $today . "','" . $_SERVER['REMOTE_ADDR'] . "','" . $date->add(new DateInterval('P7D'))->format('Y-m-d') . "')";
    echo  $sql;
 $result = mysql_query($sql) or die ("add user info  failed" . mysql_error());
    if($result){
        
        
         session_start();
        $row = mysql_fetch_array($result);
    $_SESSION['uid']=$row[mysql_insert_id()];
    $_SESSION['uname']=$_REQUEST['nid'];
        getConfig();
    return true;
}else{
    return false;
}   
    
}//CreateUserEntry

function authenticateUser(){
    
    include 'openDB.php';
include 'dquestions.php';
//$ADD_SERVICE="insert into dat_services(thing_id_fk,service_name,description,isenabled,created_on) values(";

  date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time()); 
    
    //$GET_USR_DTLS="select id,userid,isEmp,last_login,last_login_ip,expiry_date from mas_users where userid='";
    $sql=$GET_USR_DTLS . $_REQUEST['nid']. "' and pwd='" . $_REQUEST['npwd'] . "' order by expiry_date desc";
  // echo $sql;
$result = mysql_query($sql) or die ("auth user info  failed" . mysql_error());

if(mysql_num_rows($result)>0){
    echo "user exists";
    session_start();
    $row = mysql_fetch_array($result);
    if($row['expiry_date']> $today){
     //echo "valida login";   
         updateUserAuditInfo();
        session_start();
    $_SESSION['uid']=$row['id'];
    $_SESSION['uname']=$row['userid'];
    $_SESSION['iscust']=1;    
        getConfig();
        $sfurl="Location: /clanding.php";
	header($sfurl);
    }else{
        echo "login expired!!";   
        $_SESSION['msg']="Your credentials have expired. Please inform your technologia contact to renew.";
        $sfurl="Location: /index.php";
	header($sfurl);
    }
    
    
    return true;
    
}else{
    session_start();
     $_SESSION['msg']="Invalid Credentials.";
        $sfurl="Location: /index.php";
	header($sfurl);
    return false;
}
    
}//authenticateUser

function getConfig(){
    //reads mas_config table and puts the domain name and port in session. This is needed for publishing the link.
    include 'openDB.php';
include 'dquestions.php';
//$GET_CONFIG="select id,config_var,var_value from mas_config";

$SQL_GET_CONFIG=$GET_CONFIG . " where config_var='dom_name'";
    
  
$result = mysql_query($SQL_GET_CONFIG) or die ("get configs failed" . mysql_error());
$row = mysql_fetch_array($result);
 session_start();
    
    $_SESSION['domname']=$row['var_value'];
        
//        mysql_close($result);
    
}//getConfig