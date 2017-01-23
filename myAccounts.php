

<?php

 session_start();
include 'openDB.php';
include 'dquestions.php';
//$GET_MY_ACCTS="select t1.id,t1.userid,t1.isEmp,t1.last_login,t1.last_login_ip,t1.expiry_date,t1.recomended_by_fk from mas_users t1,mas_users t2 t1.recomended_by_fk=t2.id where userid='";


    
    //$GET_USR_DTLS="select id,userid,isEmp,last_login,last_login_ip,expiry_date from mas_users where userid='";
    $sql=$GET_MY_ACCTS . $_SESSION['uid'];
   //echo $sql;
$result = mysql_query($sql) or die ("get my accts info  failed" . mysql_error());

$count=0;
while($row = mysql_fetch_array($result)){
    
    if($count==0){
        echo "<table border=1><tr><td>Login</td><td>Expiry Date</td><td>Created On</td><td>last Login</td><td>last Login IP</td></tr>";
    }
    
    echo "<tr><td>". $row['userid'] . "</td><td>". $row['expiry_date'] . "</td><td>".$row['created_on'] . "</td><td>". $row['last_login'] . "</td><td>". $row['last_login_ip'] . "</td></tr>";
    $count++;
    
}//while

if($count!=0){
    echo "</table>";
}



?>