

<br>

<br>
    <?php
session_start();

if(isset($_SESSION['msg'])){
    echo  $_SESSION['msg'];
    unset($_SESSION['msg']);
}


?>
<a href="cuser.php">Create User</a><br>
<a href="myAccounts.php">My USers</a><br>
<a href="fpush.php">Uplaod File</a>