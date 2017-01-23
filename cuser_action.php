<?php

if(strpos($_REQUEST['cemail'],'@technologia')){
    session_start();
 $_SESSION['msg']="Account cannot be created for ESSPL employees. They can login directly with their network credentials.";
        $sfurl="Location: /cuser1.php";
	header($sfurl);   
    
}

if(!strpos($_REQUEST['cemail'],'@')){
    session_start();
 $_SESSION['msg']="Valid email is needed for account creation.";
        $sfurl="Location: /cuser1.php";
	header($sfurl);   
    
}

//now create the customer account


if(!checkUserExists()){
    //this means account doesnot exist
    CreateUserEntry();
    
    $_SESSION['msg']="Account has been created sucessfully.";
    $sfurl="Location: /myaccounts1.php";
	header($sfurl); 
}else{
    //this means acct exists 
     session_start();
 
    //echo $_SESSION['msg'];
    $sfurl="Location: /cuser1.php";
	header($sfurl); 
}


function CreateUserEntry(){
    include 'openDB.php';
include 'dquestions.php';
   date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time()); 
    
    //$ADD_ACCT_DTLS="insert into mas_users(userid,isEmp,expiry_date,pwd,created_on,recomended_by_fk) values('";
    $date = new DateTime('now');
    session_start();
    $pwd=generateRandomString();
    $sql=$ADD_ACCT_DTLS. $_REQUEST['cemail']. "',0,'" . $date->add(new DateInterval('P7D'))->format('Y-m-d') . "','" .$pwd .  "','". $today  . "'," . $_SESSION['uid'].")";
    echo  $sql;
 $result = mysql_query($sql) or die ("add user info  failed" . mysql_error());
    if($result){
        
    return true;
}else{
    return false;
}   
    
}//CreateUserEntry


//random passwd generator
function generateRandomString() {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
}


function checkUserExists(){
 //this returns true if entry exists for username in mas_users table
    session_start();
include 'openDB.php';
include 'dquestions.php';
//$ADD_SERVICE="insert into dat_services(thing_id_fk,service_name,description,isenabled,created_on) values(";
   date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time()); 

    
    //$GET_USR_DTLS="select id,userid,isEmp,last_login,last_login_ip,expiry_date from mas_users where userid='";
    $sql=$GET_USR_DTLS . $_REQUEST['cemail']. "' and expiry_date > '" . $today . "'";
   // echo $sql;
$result = mysql_query($sql) or die ("get acct info  failed" . mysql_error());

if(mysql_num_rows($result)>0){
    $row = mysql_fetch_array($result);
    $_SESSION['msg']="Account already exists with valid expiry date of " . $row['expiry_date'] . ".";

    echo "user exists " . $row['expiry_date'];
    return true;
    
}else{
    echo "user DOESNOT  exists";
    return false;
}
    
}//checkUserExists()



?>