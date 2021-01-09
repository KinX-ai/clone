<?php
/* * BOT CHAT SIMSIMI * *\
* Download: https://youtu.be/6SbukF0ZakE
* Version: 1.0
* File: Config Function
* Author : Đỗ Minh Hiếu
* Date: 22/11/2020
* Facebook: fb.com/dohieu.2k6
* Vui Lòng Kính Trọng Người Làm Ra Nó. Không Nên Xóa Dòng Này
*/
function ans($text, $conn) {
    if ($text == '') {
        die("Bạn Đang Để Trống Câu Hỏi");
    } else {
        $query = "SELECT * FROM `sim` WHERE `ask` = '$text'";
        $result = mysqli_query($conn, $query);
		if ($result) {
			while ($row = mysqli_fetch_array($result)) {
				if ($row['ask'] == $text) {
					return "<font color='#00FF00'>".$row['ans']."</font>";
			    }
			}
			$data = get_data($text);
		        if ($data['code'] == '1') {
			        $save = save_data($text, $data['msg'], 'API', $conn);
			        return $data['msg'];
			    } else {
				    return $data['msg'];
			    }
		} else {
			$data = get_data($text);
		    if ($data['code'] == '1') {
			    $save = save_data($text, $data['msg'], 'API', $conn);
			    return $data['msg'];
			} else {
				return $data['msg'];
			}
		}
	}
}

function save_data($ask, $ans, $ip, $conn){
    if (!$ask) {
		return "Bạn Đang Để Trống Câu Hỏi";
	}
	if (!$ans) {
		return "Bạn Đang Để Trống Câu Trả Lời";
	}
	$query = "SELECT * FROM `sim` WHERE `ask` = '$ask'";
	$result = mysqli_query($conn, $query);
	if ($result) {
		while ($row = mysqli_fetch_array($result)) 
		{
			if ($row['ask'] == $ask) 
			{
				die('Câu Hỏi Đã Có. Vui Lòng Hỏi Câu Khác');
			}
		}
		$query = "INSERT INTO `sim`(`ask`, `ans`, `ip`, `time`) VALUES ('$ask', '$ans', '$ip', now())";
		mysqli_query($conn, $query);
		return "Sim Đã Ghi Nhớ <br /> Hỏi: ".$ask." <br /> Đáp: ".$ans;
	}
}

function get_data($ask) {
    $hoi = urlencode(utf8_decode($ask));
	$get = 'http://k6vn.ml/api-test?text='.$hoi;
	$data = file($get);
	$text = $data[0];
	$msg = json_decode($text);
	if ($msg == NULL || $data == '') {
		return array("msg" => 'Em Không Hiểu Gì Hết Trơn Á! Dạy Em Đi!!', "code" => '0');
	} else if ($msg->out == "Em không hiểu gì hết trơn á") {
		return array("msg" => 'Em không hiểu gì hết trơn á', "code" => '0');
    } else {
	    return array("msg" => $msg->out, "code" => '1');
	}
}
 
function get_ip() {
if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') > 0) {
$addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
return trim($addr[0]);
    } else {
return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
} else {
    return $_SERVER['REMOTE_ADDR'];
}
}

function block_ip($ip, $type, $conn) {
    if($type == 'check') {
        $query = "SELECT * FROM `block_ip` WHERE `ip` = '$ip'";
	    $result = mysqli_query($conn, $query);
	    //$num = mysqli_num_rows($result);
	    if($result != '') {
		    return 'yes';//IP is block
		} else {
			return 'no';//IP is not block
		}
    } else {
        $query = "INSERT INTO `block`(`ip`, `time`) VALUES ('$ip', now())";
	    mysqli_query($conn, $query);
	    return 'blocked';
	}
}
    