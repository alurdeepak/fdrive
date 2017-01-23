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
<script>
    function kalsa(){
    
        if(document.forms[0].nid.value.trim().length!=0|| document.forms[0].npwd.value.trim().length!=0){
    document.f1.action="aauth_action.php";
        
     document.f1.submit();
        return true;
            
        }else{
            alert("Please provide complete credentials.");
            return false;
            
        }
    }
    </script>


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
      <td><span class="font1">Username:</span></td>
    </tr>
    <tr >
      <td  height="6"></td>
    </tr>
          
    <tr>
      <td><form name="f1" action="aauth_action.php" method="post" class="label-top" >
			    	<input type="text" name="nid" id="nid" value="" tabindex="1"  alt="title of the image"  placeholder="Username" class="input"  />
			
            </td>
    </tr>
    <tr>
      <td height="5"></td>
    </tr>
    <tr>
      <td><span class="font1">Password:</span></td>
    </tr>
     <tr>
      <td class="font1" height="6"></td>
    
    </tr>
    <tr>
      <td>
			   <input type="password" name="npwd" id="npwd" value="" tabindex="1"  alt="title of the image"  placeholder="Password" class="input"  />
				</td>
    </tr>

   
      <tr>
      <td class="font1" height="20"> </td>
    </tr>

     <tr >
      <td class="font1" height="10" width="50%"><a> <div onClick="return kalsa()" class="btn">SIGN IN</div> </a></td>
</form>
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
