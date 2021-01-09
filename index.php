<?php
/* * BOT CHAT SIMSIMI * *\
* Download: https://youtu.be/6SbukF0ZakE
* Version: 1.0
* File: Index
* Author : Đỗ Minh Hiếu
* Date: 22/11/2020
* Facebook: fb.com/dohieu.2k6
* Vui Lòng Kính Trọng Người Làm Ra Nó. Không Nên Xóa Dòng Này
*/
include('cnf_data.php');
include('cnf_func.php');
$ip = get_ip();
$block = block_ip($ip, 'chec', $conn);
if ($block == 'yes') {
    die('Your ip is blocked');
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; UTF-8" />
	<meta http-equiv="content-language" content="vi" />
	<meta http-equiv="revisit-after" content="1 days" />
		<!-- SEO -->
	<meta name="description" content="simi hệ thống chát tự động, dạy dỗ simi, dạy simi học, simi trả lời cmt fb, simi trả lời inbox fb" />
	<meta name="author" content="Đỗ Minh Hiếu" />
	<meta name="copyright" content="Đỗ Minh Hiếu" />
	<meta name="robots" content="index, follow" />
	<meta property="fb:admins" content="<?php echo $fbadmin;?>" />
	<meta property="og:url" content="<?php echo $siteurl;?>" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="<?php echo $description;?>" />
	<meta property="og:locale" content="vi_VN" />
	<meta property="article:author" content="Đỗ Minh Hiếu" />
	<meta property="article:publisher" content="https://www.facebook.com/dohieu.2k6" />
	<link type="image/x-icon" href="icon/sim.png" rel="shortcut icon" />
	<title>Simsimi</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
	<script src="js/jquery.min.js"></script>
</head>
<style>
		body {
		padding-top: 20px;
		}
		footer {
		padding-bottom: 10px;
		}
</style>
    <body>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading bg-light-blue">
							<h4>SimSimi</h4>
						</div>
						<div class="panel-body">
							<p><input type="text"  value="" id="hoi" onkeydown="if(event.keyCode == 13) posts();" class="form-control" placeholder="Viết gì đi ạ.."/></p>
							<p><button class="btn btn-primary" type="button" id="simi" onclick="posts();"><i class="fa fa-exchange"></i> Hỏi</button> <button class="btn btn-primary" type="button" id="simi" onclick='window.location = "/bot-api.php"'>Bot API</button></p></p>

							
							<div class="list-group" id="messages">
								<div class="alert alert-info" role="alert">
								<b>Simi trả lời màu <font color="#000000">ĐEN</font> là chưa được dạy. <br/>
								Simi trả lời màu <font color="#00FF00">XANH</font> là đã được dạy.</b>
								</div>
							</div>
						
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading bg-light-blue">
							<h4>Dạy Sim nói</h4>
						</div>
						<div class="panel-body">
							<p>Hỏi: <input type="text" name="ask" value="" id="ask"  class="form-control" placeholder="Câu hỏi.."/></p>
							<p>Đáp: <input type="text" name="ans" value="" id="ans" class="form-control" placeholder="Câu trả lời.."/></p>
							<button type="button"  id="simsimi"  class="btn btn-primary" onclick="post();"><i class="fa fa-exchange"></i> Dạy Sim</button>
							<p>
								<div id="star" style="display: none;">
									<div class="alert alert-info" id="message">
										
									</div>
								</div>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- /row -->
<div class="panel panel-primary">
                    <div class="panel-heading bg-light-blue">
                        <h4>Lưu Ý</h4>
                    </div>

                    <div class="panel-body">

<div class="g-plusone" data-size="medium"></div>
				Bạn không được dạy SimSimi những câu nói tục, chửi bậy,... Nếu bị phát hiện sẽ bị chặn IP.
    <br />


		</div></div>
<footer class="page-footer font-small blue">

  <!-- Copyrigh-->
  <div class="footer-copyright text-center py-3">©Copyright 2020
    <a href="<?php echo $siteurl;?>">Chat SimSimi</a> - All Right Service
  </div>
  <!-- Copyright -->
  <!-- Author -->
   <div class="text-center py-3">Power By
    <a href="https://facebook.com/dohieu.2k6">Đỗ Minh Hiếu</a> | <a href='mailto:dominhhieu145@gmail.com?subject=Góp%20Ý%20%26%20Báo%20Lỗi'>Góp ý & Báo Lỗi</a>
  </div>
  <!--author-->

</footer>
	</body>
<script type="text/javascript">
function log(msg) {
	$('#message').html('');
	$('#message').append(msg);
	$('#message').fadeIn(999);
}
function post(){
	asks = document.getElementById('ask').value;
	anss = document.getElementById('ans').value;
	document.getElementById("simsimi").disabled = true;
	$("#simsimi").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
	$("#message").html("");
	$('#star').show();
	log('<i class="fa fa-spinner fa-spin"></i> Vui Lòng Đợi ... ')
	$.post('post_sim.php', {
	ask: asks,
	type: "day",
	ans: anss
	}, function(data, status) {
	log(data);
	$("#simsimi").html('<i class="fa fa-exchange"></i> Dạy Sim');
	document.getElementById("simsimi").disabled = false;
	});

}
function posts(){
	hois = document.getElementById('hoi').value;
	document.getElementById("simi").disabled = true;
	$("#simi").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
	$("#messages").html("");
	$.post('post_sim.php', {
	hoi: hois
	}, function(data, status) {
	$('#messages').html('');
	 $("#hoi").val('');
	$('<li class="list-group-item"><img width="25px" height="25px" src="icon/ask.png" alt="»"/><font color="blue"><b>Bạn</b>: '+hois+'</li>').insertAfter($("#messages"));
	$(' <li class="list-group-item"><img src="icon/sim.png" width="25px" height="25px" alt="»"/><font color="red"><b>Simi</b>:</font> '+data+'</li>').insertAfter($("#messages"));
	$("#simi").html('<i class="fa fa-exchange"></i> Hỏi');
	document.getElementById("simi").disabled = false;
	});

}
</script>
</html>