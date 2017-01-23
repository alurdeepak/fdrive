<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>T Drive - technologia</title>
<!--style-->
<link rel="stylesheet" type="text/css" href="style/cssstyles.css" />
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color:#000000;
}
</style>

<!--Script-->



</head>

<body>
<!--Body-->
<!--header-->
<div style="margin:0 auto; height:60px; width:100%; background-color:#000;">
  <div style="margin:0 auto; height:60px; width:100%; background-color:#000;">
  <div style="float:left; height:60px; width:200px; padding-left:10px;">
  <img src="images/technologia-logo.png" width="180" height="54" alt=""/></div>




</div>

</div>

<!--Login-->

<div style="margin:0 auto; height:560px; width:100%;">

<div style="width:100%;">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" background="images/laptop.png" height="560">
 	 <tbody>
     <tr>
       <td align="center" ><img src="images/tdrive.png" width="300" height="194" alt=""/></td></tr>
       <tr>
      <td valign="middle">
       <?php
session_start();
if(isset($_SESSION['msg'])){
echo "<center><span class=font1>" . $_SESSION['msg']. "</span></center><br><br>";
unset($_SESSION['msg']);	
}

?>
          <table width="250" border="0" cellpadding="0" cellspacing="0" align="center" height="250">
 	 <tbody>
    
   <tr>
      <td><span class="font3"><?php

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
       // echo "<a style=font-size:50px href=http://10.1.8.15:3333/tmp/" . $row['fcode'] . ">Download</a>";
         session_start();
    //$fname=split("___",$row['fcode']);
    
        echo "<a style=font-size:50px href=\"".$_SESSION['domname'] ."/tmp/" . $row['fcode']  . "\"> Download </a>";
       // echo "<br> After downloading, remove all the characters after/including ___ in file name. This is done to prevent virus attacks.";
    }
    
    
}//if


?></span></td>
    </tr>
    <tr>
        <td  height="6"><span class="font3" style=font-size:20px;color:white>After downloading, remove all the characters after/including '___' in file name. This is done to prevent virus attacks.</span></td>
    </tr>
          
    <tr>
        <td></td>
          
    </tr>
    
      <tr>
      <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
          <td><div class="forgot" align="right" style="padding-left:5px;">
          </div></td>

      <td><div class="forgot" align="right" style="padding-left:5px;"></div></td>
    </tr>
  </tbody>
</table>
 
</td>

    </tr>
    
    <tr>
      <td height="80"><div class="forgot" align="left"></div>
</td>
    </tr>
    
  </tbody>
</table></td>
    </tr>
  
  </tbody>
</table>
</div>

</div>


<!--Divider-->


<!--Slider-->



<!--footer-->



<!--Footer last -->
<div style="margin:0 auto; height:40px; width:100%; background-color:#000000;">
<table width="1000" border="0" cellspacing="0" cellpadding="0" align="center">
  <tbody>
    <tr>
      <td class="copy">Copyright © 2016. technologia™. All Rights Reserved
</td>
      <td><table width="300" border="0" cellspacing="0" cellpadding="0" align="right">
  <tbody>
    <tr>
      <td class="copy"><a href="https://www.technologiaworld.com/index.php/terms-of-use">Terms of Use</a> </td>
      <td class="copy"><a href="https://www.technologiaworld.com/index.php/privacy-policy">Privacy Policy</a> </td>
      <td class="copy"><a href="https://www.technologiaworld.com/index.php/disclaimer">Disclaimer</a></td>
      <td class="copy"><a href="https://www.technologiaworld.com/index.php/contact-us">Location</a> </td>
    </tr>
  </tbody>
</table>

</td>
    </tr>
  </tbody>
</table>


</div>


</div>

</body>
</html>
