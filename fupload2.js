var express = require('express');
var multer2  = require('multer');
var fcode1 = "_";
var storage = multer2.diskStorage({
  destination: function (req, file, cb) {
     console.log("in destination");
    cb(null, './tmp/');
  },
  filename: function (req, file, cb) {
      //console.log("in filename", fcode1);
      fcode1 = file.originalname +'____' +Date.now();
    cb(null, fcode1);
  },
    limits: {fieldNameSize:10, maxfileSize: 1000000}
});
var upload = multer2({ storage: storage });




//var fs = require("fs");
var app = express();
//app.use(multer);

app.post('/file_upload', upload.single('avatar'), function (req, res, next) {
  // req.file is the `avatar` file
  // req.body will hold the text fields, if there were any
  console.log(req.file.originalname);
    
   // fcode1=req.body.fcode;
    //console.log("fcode val is ",fcode1);
    //now write to mysql
    var mysqlv=require('mysql');
    //var pool=mysqlv.createPool({host:"localhost",user:"root",password:"toor",database:"tdrive"});
var pool=mysqlv.createPool({host:"10.1.4.12",user:"tdriveadmin",password:"techno-098",database:"tdrive"});
pool.getConnection(function (err, connection){
    
    if(err) console.log(" Connection error");
    
    //var post = '{uid_fk:' + req.body.userID +", fcode:'" + fcode1 + "',uploaded_on:'" + Date.now() +"'}";
    var now = new Date();
    var tdate=now.getFullYear() +'-' + (now.getMonth()+1) + "-" + now.getDate() +' ' +now.getHours() +':' + now.getMinutes() + ':' + now.getSeconds();
    var post={uid_fk:req.body.userID , fcode:fcode1,uploaded_on:tdate,dcode:req.body.dcode};
    var query=connection.query('INSERT INTO dat_upload_dtls SET ?',post,function(err,result){
       // console.log(query.sql);
        if(err) console.log("sql query error",err);
        
        //console.log('Query result',result);
        
    }); 
    
});
    
    
   // res.write("Doneeee");
    //res.redirect('http://10.1.8.15:3333/fpush1Result.php?dcod='+req.body.dcode);
    res.redirect('http://tdrive.technologiaworld.com/fpush1Result.php?dcod='+req.body.dcode);
    //res.end();
    

});

app.get('/fpush.php', function (req, res) {
   res.sendFile( __dirname + "/" + "fpush.php" );
});

var server = app.listen(8082, function () {

  var host = server.address().address;
  var port = server.address().port;

  console.log("T Drive Node JS Server listening at http://%s:%s", host, port);

});