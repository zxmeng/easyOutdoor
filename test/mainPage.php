<!-- Main --> 

<div id="main">
	<div align="center">
		<img class="header-picture"src="images/logo@20150303.png" >
	</div>


	<div align="center" style="margin:1em 0 1em 0;">
		<div class="mode-button">
			<div class="btn-group" role="group" aria-label="...">
				<button type="button" class="btn btn-default" id="all" onclick="loadAllEvent()">ALL</button>
				<button type="button" class="btn btn-default" id="calendar" onclick="loadCalendar()">CALENDER</button>
				<button type="button" class="btn btn-default"  id="mapSearch" onclick="loadMap()">MAP</button>
				<button type="button" class="btn btn-default" id="recommendation" onclick="loadRecommendation()">RECOMMENDATION</button>
			</div>
		</div>
	</div>

	<div id="change"><?php include_once('eventList.php'); ?></div>

	<div class="homebutton">
		<button type="button" class="btn btn-default btn-circle"  id="back" onclick="loadAllEvent()"><i class="glyphicon glyphicon-home"></i></button>
	</div>
<?php

	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}
	
	if($logged==1){
?>

<!-- 		<div class="createbutton">
			<button type="button" class="btn btn-default btn-circle btn-lg" onclick="clickCreateEvent(<?php echo $_SESSION['id']; ?>)">
			<i class="glyphicon glyphicon-plus">E</i>
			</button>
		</div> -->
		<div class="createbutton">
			<div class="dropdown">
				<button type="button" class="btn btn-default btn-circle btn-lg" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i></a></button>
			  	<ul class="dropdown-menu dropdown-menu-right"aria-labelledby="dLabel1" >
				   	<div align="right">
				   	Create Event  <button type="button" class="btn btn-default btn-circle"  style="margin:2px 5px 3px 0;" onclick="clickCreateReview(<?php //echo $_SESSION['id']; ?>)"><i class="glyphicon glyphicon-plus"></i></button><br>
				    Create Review  <button type="button" class="btn btn-default btn-circle"  style="margin:2px 5px 3px 0;" onclick="clickCreateReview(<?php //echo $_SESSION['id']; ?>)"><i class="glyphicon glyphicon-plus"></i></button>
			  		</div>
			  	</ul>
			</div>
		</div>	
<?php
	}
?>

<script src="mainScript.js"></script>
<script src="eventScript.js"></script>
<script src="reviewScript.js"></script>
<script src="commentScript.js"></script>
<script src="messageScript.js"></script>