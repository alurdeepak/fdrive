<html>
<head>
    
    </head>
    
    <body>
    <?php
session_start();

if(isset($_SESSION['msg'])){
    echo  $_SESSION['msg'];
    unset($_SESSION['msg']);
}


?>
        
        
            <form name="f1" action="aauth_action.php" method="post">
            Network Login:<input type=text name="nid"><br>
            Network Pwd:<input type="text" name="npwd"><br>
                <input type="submit">
            
            </form>
             
        
   
        
       
    
    </body>

</html>