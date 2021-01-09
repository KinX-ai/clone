<?php
/* * BOT CHAT SIMSIMI * *\
* Download: https://youtu.be/6SbukF0ZakE
* Version: 1.0
* File: Config
* Author : Đỗ Minh Hiếu
* Date: 22/11/2020
* Facebook: fb.com/dohieu.2k6
* Vui Lòng Kính Trọng Người Làm Ra Nó. Không Nên Xóa Dòng Này
*/

//Website config
$siteurl = "http://example.com/"; #website url
$fbadmin = "https://facebook.com/dohieu.2k6"; #FB admin
$description = 'simi hệ thống chát tự động, dạy dỗ simi, dạy simi học, simi trả lời cmt fb, simi trả lời inbox fb'; #Website description
$sitename = 'Simsimi';


//Database config
$config['host'] = "localhost";
$config['username'] = "";
$config['password'] = "";
$config['dbname'] = "";

if ($config['username'] == '' || $config['password'] == '' || $config['dbname'] == ''){
die('SERVER ĐANG BẢO TRÌ');
}
//Connect to Database
$conn = mysqli_connect($config['host'],$config['username'],$config['password'],$config['dbname']);


if (!$conn){
die('SERVER ĐANG BẢO TRÌ');
}
mysqli_query($conn, "SET NAMES utf8");
?>