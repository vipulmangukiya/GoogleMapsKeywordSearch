<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Google Maps </title>
	<link rel="stylesheet" href="">

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLbam_aWaGmy4O-xyjGu3WIGqtfgrMHoo&libraries=places" async defer></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<style type="text/css">
    html, body {
        height: 100%;
        margin: 0;
        padding:10;
      }
      #map {
        height: 100%;
        padding: 10px;
      }
  
	</style>
</head>
<body>
		<div id="map" style="width: 500px;height: 500px"></div>
		<br>
		<div style="padding:10px">
		<div class="form-group form-inline">
		<button class="btn btn-success" type="button" id="btn_send">Set My Location</button>
						<label for="name" ></label>
							<input type="search" id="seearch_txt"  name="" value="" class="form-control" placeholder="Search nearest place ">
					 <button type="button" class="btn btn-info" id="btn_search">Search</button></div>		
					
		</div>

</body>
</html>