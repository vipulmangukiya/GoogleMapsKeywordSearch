<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Users</title>
	<link rel="stylesheet" href="">
	<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLbam_aWaGmy4O-xyjGu3WIGqtfgrMHoo" async defer></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var op = 1;
			$.ajax({	
				type:'POST',
				url:'inc/getUsers.php',
				dataType:'json',
				data:{
					op:op
				},
				success :function(data) {
					$("#users_list").html(data.users);
				},
				error: function(error) {

				}
			});
			
			$(document).on("click", ".mapview",function(){
			var user_id = $(this).val(),
				op = 2;

				$.ajax({	
					type:'POST',
					url:'inc/getUsers.php',
					dataType:'json',
					data:{
						op:op,
						user_id:user_id
					},
					success :function(data) {
						watch(data.latitude,data.longitude);
					},
					error: function(error) {

					}
				});
			});
		});
		 function watch(latitude,longitude) {
			var latLong = new google.maps.LatLng(latitude,longitude);
			var mapOptions = {
						center: latLong,
						zoom: 13,
						mapTypeId: google.maps.MapTypeId.ROADMAP
				};
			var map = new google.maps.Map(document.getElementById("map"),mapOptions);
			var marker = new google.maps.Marker({
				position: latLong,
				map: map,
				title: 'Vipz'
			});
	
		}
	</script>
</head>
<body>
	<div class="container">
			<div class="page-header">
				Registred Users
			</div>
			<div class="col-md-6">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Users Name</th>
								<th>Location</th>
							</tr>
						</thead>
						<tbody id="users_list">
							
						</tbody>
					</table>
				</div>
			</div>
	
	</div>
	<center>
		<div id="map" style="height: 500px;width: 500px"></div>		
	</center>
</body>
</html>