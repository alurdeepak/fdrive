<html>
<head>
<title>File Uploading Form</title>
</head>
<body>
<h3>File Upload:</h3>
Select a file to upload: <br />
<form name="files" action="http://10.1.8.15:8082/file_upload" method="post" 
      enctype="multipart/form-data">
<input type="file" name="avatar" size="50" />
   
    <br><input type=hidden name="userID" value=<?php  session_start();echo $_SESSION['uid'] ?> >
    <br><input type=text name="dcode" value=<?php  echo substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);?> >
    
<br>
<input type="submit" value="Upload File" />
</form>
</body>
</html>