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

<!-- <div class="createbutton">
	<button type="button" class="btn btn-default btn-circle btn-lg" onclick="clickCreateEvent(<?php //echo 1; ?>)">
	<i class="glyphicon glyphicon-plus">E</i>
	</button>
</div> -->

<div class="createbutton">
	<button type="button" class="btn btn-default btn-circle btn-lg" onclick="clickCreateReview(<?php echo 1; ?>)">
	<i class="glyphicon glyphicon-plus">R</i>
	</button>
</div>

<script src="mainScript.js"></script>
<script src="eventScript.js"></script>
<script src="reviewScript.js"></script>