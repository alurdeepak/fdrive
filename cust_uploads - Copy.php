<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
include 'openDB.php';
include 'dquestions.php';
//$GET_MY_ACCT_FILES="SELECT t1.id,t1.userid, t2.fcode,t2.uploaded_on,t2.dcode FROM mas_users t1,dat_upload_dtls t2 WHERE t2.uid_fk=t1.id AND t1.recomended_by_fk=";

    $sql=$GET_MY_ACCT_FILES. $_SESSION['uid'] . " order by t2.uploaded_on desc";
  //echo $sql;
$result = mysql_query($sql) or die ("get my file info info  failed" . mysql_error());

$count=0;
while($row = mysql_fetch_array($result)){
    
    if($count==0){
        echo "<table border=1 width=90%><tr bgcolor=\"#ebebeb\"><td>User name</td><td>File Name</td><td>Uploaded On</td><td></td><td></td></tr>";
    }
    
    $flink=$_SESSION['domname']."/custDownload.php?dcode=" .$row['fcode'];
    echo "<tr class=\"font6\"><td>". $row['userid'] . "</td><td>". $row['fcode'] . "</td><td>".$row['uploaded_on']."</td><td><a id=\"" . $tag.$count."\" href=".$flink.">" . $flink."</a></td><td>      <button data-clipboard-text=\"" .$flink ."\" style=\"height:30px; width:70px;\" class=\"btn\" align=\"center\">Copy </button></tr>";
    $count++;
    
}//while

if($count!=0){
    echo "</table>";
}



?>
 <script src="style/clipboard.min.js">
    
    </script>
    <script>
    var btns = document.querySelectorAll('button');
    var clipboard = new Clipboard(btns);
    clipboard.on('success', function(e) {
        console.log(e);
    });
    clipboard.on('error', function(e) {
        console.log(e);
    });
    </script>       