<?php

$GET_USR_DTLS="select id,userid,isEmp,last_login,last_login_ip,expiry_date from mas_users where userid='";
$UPD_USR_DTLS="update mas_users set";
$ADD_USR_DTLS="insert into mas_users(userid,isEmp,last_login,last_login_ip,expiry_date) values('";
$ADD_ACCT_DTLS="insert into mas_users(userid,isEmp,expiry_date,pwd,created_on,recomended_by_fk) values('";
$GET_MY_ACCTS="select t1.id,t1.userid,t1.pwd,t1.isEmp,t1.last_login,t1.last_login_ip,t1.expiry_date,t1.recomended_by_fk,created_on from mas_users t1 where t1.recomended_by_fk=";
$GET_FILE=" select * from dat_upload_dtls where dcode='";
$GET_USR_FILES="SELECT t1.id,fcode, uploaded_on,t2.dcode FROM mas_users t1,dat_upload_dtls t2 WHERE t1.id=t2.uid_fk AND t1.id=";
$GET_CONFIG="select id,config_var,var_value from mas_config";
$GET_MY_ACCT_FILES="SELECT t1.id,t1.userid, t2.fcode,t2.uploaded_on,t2.dcode FROM mas_users t1,dat_upload_dtls t2 WHERE t2.uid_fk=t1.id AND t1.recomended_by_fk=";
?>