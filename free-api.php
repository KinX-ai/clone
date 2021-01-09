<?php
/* * BOT CHAT SIMSIMI * *\
* Download: https://youtu.be/6SbukF0ZakE
* Version: 1.0
* File: Get Api
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
	<meta property="og:url" content="" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="<?php echo $description;?>" />
	<meta property="og:locale" content="vi_VN" />
	<meta property="article:author" content="Đỗ Minh Hiếu" />
	<meta property="article:publisher" content="https://www.facebook.com/dohieu.2k6" />
	<link type="image/x-icon" href="icon/sim.png" rel="shortcut icon" />
	<title>Simsimi API</title>
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
    <!--Content -->
    <div class="container">
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-primary"> 
				     <div class="panel-heading bg-light-blue"><b>SimSimi API</b>
				    </div> 
				    <div class="panel-body">
					    <div style="color:gray;">Just use messages adn format as params to the API URL below.</div>
					    <div>API for your product:</div>
					    <code>GET: <?php echo $siteurl . 'api/?text=[MESSAGES]&format=[FORMAT]';?></code><br>
						<ul>
							<li><code>[MESSAGES]</code> Query Messages(max 1000 characters)</li>
							<li><code>[FORMAT]</code> Response Format: text, json, csv, pipe (value is json)</li>
						</ul>
							
					</div>
				</div>
				<div class="panel panel-primary"> 
				     <div class="panel-heading bg-light-blue"><b>Example:</b>
				    </div> 
				    <div class="panel-body">
					    <div>Example Request: <span style='color:blue;'>text=hi</span></div><br>
						
					<div id='json'>
						<label>Format <span style='color:red;'>JSON</span>: </label>
					    <code>GET: <?php echo $siteurl . 'api/?text=hi&format=json';?></code><br>
					    <label><span style='color:gray;'>Result</span>:</label><br>
						<code>{"code":"0", "status":"success", "text":"hello"}</code>
					</div><br>
						
					<div id='text'>
						<label>Format <span style='color:red;'>TEXT</span>: </label>
					    <code>GET: <?php echo $siteurl . 'api/?text=hi&format=text';?></code><br>
					    <label><span style='color:gray;'>Result</span>:</label><br>
						<code>hello</code>
					</div><br>
						
					<div id='csv'>
						<label>Format <span style='color:red;'>CSV</span>: </label>
					    <code>GET: <?php echo $siteurl . 'api/?text=hi&format=csv';?></code><br>
					    <label><span style='color:gray;'>Result</span>:</label><br>
						<code>0, success, hello</code>
					</div><br>
						
					<div id='pipe'>
						<label>Format <span style='color:red;'>PIPE</span>: </label>
					    <code>GET: <?php echo $siteurl . 'api/?text=hi&format=pipe';?></code><br>
					    <label><span style='color:gray;'>Result</span>:</label><br>
						<code>0 | success | hello</code>
					</div>
					
					</div>
				</div>
			</div>
		</div>
    </div>
    <!--End content -->
	 <script src="js/bootstrap.min.js" type=text/javascript></script>
<footer class="page-footer font-small blue">

  <!-- Copyright -->
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
</html>