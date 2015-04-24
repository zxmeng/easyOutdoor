<!-- Main --> 

<div id="main">
	<div align="center"><img class="header-picture welcome"src="images/welcome.png" ><br>
		<img style="margin:-6px 0 0 0;"class="header-picture"src="images/logo@20150303.png" >
	</div>

	<div align="center" style="margin:1em 0 1em 0;">
		<div class="mode-button">
			<div class="btn-group btn-group-justified" role="group" aria-label="...">
				<div class="btn-group" role="group">
				<button type="button" class="btn btn-default" id="all" onclick="loadAllEvent()">ALL</button>
				</div>
				<div class="btn-group" role="group">
				<button type="button" class="btn btn-default" id="calendar" onclick="loadCalendar()">CALENDAR</button>
				</div>
				<div class="btn-group" role="group">
				<button type="button" class="btn btn-default"  id="mapSearch" onclick="loadMap()">MAP</button>
				</div>
				<div class="btn-group" role="group">
				<button type="button" class="btn btn-default" id="recommendation" onclick="loadRecommendation()">RECOMM</button>
				</div>
			</div>
		</div>
	</div>

	<div id="change"><?php include_once('eventList.php'); ?></div>
	<!-- innerHTML of this div will be updated by user's actions -->

	<div class="homebutton">
		<button type="button" class="btn btn-default btn-circle btn-lg"  id="back" onclick="goToTop()"><i class="glyphicon glyphicon-home"></i></button>
		<!-- click this button to go to home page -->
	</div>
<?php

	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}
	
	if($logged==1){
		// if logged in, then user can create events/reviews
?>

		<div class="createbutton">
			<div class="dropdown">
				<button type="button" class="btn btn-default btn-circle btn-lg" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i></a></button>
				  	<ul class="dropdown-menu dropdown-menu-right"aria-labelledby="dLabel1" >
					   	<div align="right">
					   	Create Event  <button type="button" class="btn btn-default btn-circle"  style="margin:2px 5px 3px 0;" onclick="clickCreateEvent(<?php echo $_SESSION['id']; ?>)"><i class="glyphicon glyphicon-plus"></i></button><br>
					    Create Review  <button type="button" class="btn btn-default btn-circle"  style="margin:2px 5px 3px 0;" onclick="clickCreateReview(<?php echo $_SESSION['id']; ?>)"><i class="glyphicon glyphicon-plus"></i></button>
				  		</div>
				  	</ul>
			</div>
		</div>	
<?php
	}
?>
