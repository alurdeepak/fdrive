
<?php
session_start();

unset($_SESSION['uid']);
unset($_SESSION['uname']);
unset($_SESSION['iscust']);
    
        
session_unset();
//session_destroy();
//$_SESSION = array();
	//$path="Location: /index.php";

$_SESSION['msg']="Successfully Logged out.";

$sfurl="Location: /index.php";
	header($sfurl);


?>