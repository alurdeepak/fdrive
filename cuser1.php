<!doctype html>
<html>
<head>

<meta charset="utf-8">

<title>Technowebtop</title>



<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
   $('.hoverTable tr').click(function() {
      $(this).toggleClass("clicked");
    });
});
</script>

   
    
<link rel="stylesheet" type="text/css" href="style/cssstyles.css" />


<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<script>
    
    function submitMado(){
       
     if(document.forms[0].cemail.value.trim().length!=0){
         document.forms[0].action="cuser_action.php";
        document.forms[0].submit();
       
        
    }else{
     alert("Please enter a valid email.");   
      
    }
    }
    </script>
</head>

<body>

<!--Header -->
<div style="height:50px; width:100%; background-color:#ffffff;">


<div style="width:50px; height:50px; float:left; padding-left:10px;">
<img src="images/technologia-logo.png" width="163" height="50" alt=""/>
</div>

<div style="width:50%; height:50px; float:right;">

<table  cellpadding="0" cellspacing="0" align="right">
  <tbody>
  <tr><td height="15"></td></tr>
    <tr>
   <?php include 'header.php';?>
      
      <td width="30"  align="right" style="padding-right:15px;">
      <a href="logout.php"><img src="images/logout.png" width="20" height="20"  alt=""/></a></td>
    </tr>
  </tbody>
</table>


   

</div>

</div>



<div style="height:1px; margin:0 auto; background-color:#77a131;">
</div>

<!--Body -->
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f2f4f5">
  <tbody>
    <tr>
      <td width="260" valign="top"><table  width="250" cellpadding="0" cellspacing="0">
    <tr>
        <td style="background-color:#eeeeee;" width="200" height="200" valign="top">
        <table width="100%"  cellpadding="0" cellspacing="0" align="center">
  <td>
    <tr>
      <td height="140" align="center"><img src="images/tlogo.png" height="95" alt=""/></td>
    </tr>
    
    <tr><td align="center" bgcolor=""><a href="fpush1.php"><div style="height:20px; width:150px;" class="btn" align="center">UPLOAD</div></a>
</td></tr>
<tr><td height="10"></td></tr>
     <tr>
      <td height="40" class="font4" style="padding:0px;" align="center">
<div class="menu_simple" style="text-align:left;">
<?php
    include 'menu.php';
    ?>

</div>
      
      </td>
    </tr>
  
  <td height="230"  class="font4"  style="padding:10px;"></td>
    </tr>
      

</table>
</td>
    </tr>

</table></td>
      <td valign="top">
      <!--top line table starts-->
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="20"></td>
    </tr>
  </tbody>
</table>	
      <!--top line table ends-->

      <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
        <tbody>
      
         <tr>
            <td colspan="2" height="0" class="header1" >Create User (for them to login and upload docs for you)</td>
          
          </tr>
      
             <tr>
            <td class="forgot" style="padding:10px; height:230px;" valign="top"> <table width="100%" >
        <tbody>
            <table width="100" border="0" cellspacing="0" cellpadding="0">
  <tbody>
        <?php
//session_start();

if(isset($_SESSION['msg'])){
    echo  $_SESSION['msg']. "<br>";
    unset($_SESSION['msg']);
}


?>
      <form action="cuser_action.php" method="post">

Contact Email:<input type="text" name="cemail"><br>

    <div>
    Note: Password will be auto generated and mailed to the email ID. This account will be valid for 7 days.
    </div>

<div onclick="submitMado()" style="height:20px; width:140px;" class="btn" align="center">Create User Account</div>         
</form>      
       <td width="20" height="10">&nbsp;</td>
      <td></td>
    </tr>
  </tbody>
</table>

            </td>
            
            
          </tr>
          
                    </tbody>
      </table>
</td>
          
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>

<!--Footer -->
<table width="100%"  cellspacing="0" cellpadding="0" bgcolor="#000000" >
  <tbody>
    <tr>
      <td><table width="100%"  cellspacing="0" cellpadding="0" align="right">
  <tbody>
    <tr>
      <td align="center" style="padding:20px;"><div style="margin:0 auto; height:40px; width:100%; background-color:#000000;">
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


</div></td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>

</body>
</html>