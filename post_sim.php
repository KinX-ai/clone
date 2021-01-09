<?php
/* * BOT CHAT SIMSIMI * *\
* Download: https://youtu.be/6SbukF0ZakE
* Version: 1.0
* File: Ajax SimSimi
* Author : Đỗ Minh Hiếu
* Date: 22/11/2020
* Facebook: fb.com/dohieu.2k6
* Vui Lòng Kính Trọng Người Làm Ra Nó. Không Nên Xóa Dòng Này
*/
require('cnf_data.php');
require('cnf_func.php');
$ip = get_ip();
$block = block_ip($ip, 'check', $conn);
if ($block == 'yes') {
    die('Your ip is blocked');
}
if ($_POST) 
{
	if ($_POST['type'] == "day") {
		$ask = $_POST['ask'];
		$ans = $_POST['ans'];
		$ip = get_ip();
		$result = save_data($ask, $ans, $ip, $conn);
		echo $result;
	} else {
		$hoi = $_POST['hoi'];
		if (!$hoi) 
		{
			die("Bạn Chưa Nhập Câu Hỏi");
		} else {
			$result = ans($hoi, $conn);
			echo $result;
		}
	}
}
else
{
	echo 'Welcome To my Website.';
}