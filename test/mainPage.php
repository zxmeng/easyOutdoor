<!-- Main -->

<div id="main">
	<div align="center">
		<img class="header-picture"src="images/logo@20150303.png" >
	</div>

	<div id="change">
		<?php include_once('eventList.php'); ?>
	</div>

	<div class="button" type="button" id="back" onclick="loadAllEvent()">
		Home
	</div>

</div>

<div class="createbutton">
	<button type="button" class="btn btn-default btn-circle btn-lg" onclick="clickCreate(<?php echo 1; ?>)">
	<i class="glyphicon glyphicon-plus"></i>
	</button>
</div>

<script src="mainScript.js">
// function clickBack(){
// 	switch(backFlag){
// 		case 1:
// 			loadAllEvent();
// 			break;
// 		case 2:
// 			loadCalendar());
// 			break;
// 		case 3:
// 			loadMap();
// 			break;
// 		case 4:
// 			loadRecommendation();
// 			break;
// 		default:
// 			loadAllEvent();
// 			break;
// 	}
// }
</script>