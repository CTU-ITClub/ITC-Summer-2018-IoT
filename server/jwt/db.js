var mysql=require('mysql');
var connection = mysql.createConnection({
  // host:'db4free.net',
  // user:'ngthuc',
  // password:'ITC@2018',
  // database:'itc_db2018'
  host:'localhost',
  user:'root',
  password:'mysql',
  database:'nckh'
  // host:'sv.hoangthaibuinguyen.net',
  // user:'admin_nckh',
  // password:'iot@2018',
  // database:'admin_nckh'
});

// var connection = mysql.createConnection('mysql://ngthuc:tsv2018_26@db4free.net/tsv2018_26?charset=utf8_unicode_ci&timezone=Asia/Ho_Chi_Minh');
module.exports=connection;
