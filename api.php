<?php
/* * BOT CHAT SIMSIMI * *\
* Version: 1.0
* File: Api
* Author : Đỗ Minh Hiếu
* Date: 22/11/2020
* Facebook: fb.com/dohieu.2k6
* Vui Lòng Kính Trọng Người Làm Ra Nó. Không Nên Xóa Dòng Này
*/
include('cnf_data.php');
include('cnf_func.php');
$ip = get_ip();
$block = block_ip($ip, 'check', $conn);
if ($block == 'yes') {
    $code = '3';
    $status = 'unknown';
    $text = 'Your IP is blocked.';
} else if ($_GET) {
    $ask = $_GET['text'];
    $ask = addslashes($ask);
    if ($ask != '') {
        $result = mysqli_query($conn, "SELECT * FROM sim WHERE `ask` = '$ask'");
        if ($result) {
		    while ($row = mysqli_fetch_array($result)) {
			    $text = $row['ans'];
			    $code = '0';
			    $status = 'success';
		    }
	    } else {
		    $data = get_data($ask);
		    if ($data['code'] == '1') {
			    $text = $data['msg'];
			    $code = '0';
			    $status = 'success';
		    } else {
			    $text = 'Không có kết quả với câu hỏi' . $ask;
		        $code = '1';
		        $status = 'unknown';
		    }
	    }
	} else {
		$code = '2';
        $status = 'error';
        $text = 'Bạn Chưa Nhập Câu Hỏi';
	}
} else {
    $code = '2';
    $status = 'error';
    $text = 'Bạn Chưa Nhập Câu Hỏi';
}
$msg = array('code' => $code, 'status' => $status, 'text' => $text);
$type = $_GET['format'];
if ($type == 'text') {
    echo $text;
} else if($type == 'pipe') {
    echo $code . ' | ' . $status . ' | ' . $text;
} else if($type == 'csv') {
    echo "$code, $status, $text";
} else {
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
}
?>