<!-- 
$=========================================================$
@name Ẩn link
@version 0.0.1
@author Nguyễn Hưng
@facebook https://fb.com/NguyenHung1903
@description Hide my url :"3
@Date create 23/08/2018 
@comment Don't sell my products because it's free =))
@public https://github.com/nguyenhung1903/An-link/edit/master/anlink.php
$=========================================================$
-->
<html>
<head>
    <title>Ẩn Link</title>
    <meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css?v=1.2.1" rel="stylesheet"/>

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/assets-for-demo/vertical-nav.css" rel="stylesheet" />
	<link href="assets/assets-for-demo/demo.css" rel="stylesheet" />
<center>
<?php 
/*.htaccess: Rewrite ^hide/([a-zA-z0-9]+)$ anlink.php?url = $1*/
#connect mysql 
$server_username = "";
$server_password = "";
$server_host = "";
$database = '';
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới cơ sở dữ liệu");
mysqli_query($conn,"SET NAMES 'UTF8'");
# end connect mysql
function randomQR() {
	/*========================================
	  =     Xuất ra một mã ngẫu nhiên        =
	  ========================================
	*/
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $qr = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $qr[] = $alphabet[$n];
    }
    return implode($qr); 
}
if (isset($_GET['url'])){
	$url = $_GET['url'];
	$link_unhide = "";
	$sql = "SELECT * FROM url WHERE url_qr='$url'";
	$query = mysqli_query($conn,$sql);
	while ($data = mysqli_fetch_array($query)){
		$link_unhide = $data['url'];
	}
	if ($link_unhide == null){
		echo "<title>Link không tồn tại</title><p>Link không tồn tại</p>";
	} else
	echo '<title>Đang chuyển hướng...</title><META http-equiv="refresh" content="0;URL='.$link_unhide.'">';
}else echo '<title>Ẩn link</title><form action="" method="post" accept-charset="utf-8">

<?php
 <body class="index-page">

	<div class="main main-raised">
	    	<div class="container">
	        	<!--     *********    SIMPLE SUBSCRIBE LINE     *********      -->

	        	<div class="subscribe-line subscribe-line-white">
	        		<div class="container">
	        			<div class="row">
	        				<div class="col-md-6">
	        					<div class="card card-plain card-form-horizontal">
	        						<div class="card-content">
	        							<form method="" action="">
	        								<div class="row">
	        									<div class="col-sm-8">

	        										<div class="input-group">
	        											<span class="input-group-addon">
	        												<i class="material-icons">mail</i>
	        											</span>
	        											<input type="url" name="anlink_input" placeholder="Your ink" class="form-control">
	        										</div>
	        									</div>
	        									<div class="col-sm-4">
                                                <input type="submit" name="anlink_submit" value="ẩn link" class="btn btn-rose btn-round btn-block">  
	        									</div>
	        								</div>
	        							</form>
	        						</div>
	        					</div>

	        				</div>
	        			</div>
	        		</div>
	        	</div>
								</div>
							</form>
						</div>
					</div>
		      	</div>
			</div>
	    </div>
	</div>
</div>
<!--  End Modal -->


</body>
</form>';
    if (isset($_POST['anlink_submit'])){
	    $link = $_POST['anlink_input'];
	    $url_qr = randomQR();
	    $sql="INSERT INTO url(url_qr,url) VALUES ('".$url_qr."','".$link."')";
	    mysqli_query($conn,$sql);
	    echo '<input type="url" class="form-control" name="" value ="https://aftrue.me/hide/'.$url_qr.'">';
        /*Thay https://aftrue.me/hide thành url mà bạn muốn*/

    
}
?>
</head>
<!-- CSS -->
<style type="text/css" media="screen">
a{
    -webkit-transition: 0.3s;
}
a:link, a:visited {
    border: 2px solid white;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}
body{
    background-color: Black;
    margin-top:10%;
}
a:hover {
    transition: 0.3s;
    background-color: white;
    color:black;
}
a:active{
    background-color: #eeeeee;
    color:black;

}
p{
    color:white;
}
</style>
<!--/ CSS-->
</center>
<!--   Core JS Files   -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
	<script src="assets/js/moment.min.js"></script>

	<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
	<script src="assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
	<script src="assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

	<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
	<script src="assets/js/bootstrap-tagsinput.js"></script>

	<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
	<script src="assets/js/jasny-bootstrap.min.js"></script>

	<!-- Plugin For Google Maps -->
	<script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>



	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="assets/js/material-kit.js?v=1.2.1" type="text/javascript"></script>

	<!-- Fixed Sidebar Nav - JS For Demo Purpose, Don't Include it in your project -->
	<script src="assets/assets-for-demo/modernizr.js" type="text/javascript"></script>
	<script src="assets/assets-for-demo/vertical-nav.js" type="text/javascript"></script>

	<script type="text/javascript">

		$(document).ready(function(){
			var slider = document.getElementById('sliderRegular');

	        noUiSlider.create(slider, {
	            start: 40,
	            connect: [true,false],
	            range: {
	                min: 0,
	                max: 100
	            }
	        });

	        var slider2 = document.getElementById('sliderDouble');

	        noUiSlider.create(slider2, {
	            start: [ 20, 60 ],
	            connect: true,
	            range: {
	                min:  0,
	                max:  100
	            }
	        });



			materialKit.initFormExtendedDatetimepickers();

		});
	</script>
</html>
