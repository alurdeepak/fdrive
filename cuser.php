
    <?php
session_start();

if(isset($_SESSION['msg'])){
    echo  $_SESSION['msg'];
    unset($_SESSION['msg']);
}


?>
<form action="cuser_action.php" method="post">

Contact Email:<input type="text" name="cemail"><br>

    <div>
    Note: Password will be auto generated and mailed to the email ID. This account will be valid for 7 days.
    </div>
<input type="submit">
</form>

<?php
include 'myAccounts.php';
?>