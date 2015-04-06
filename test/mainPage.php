<!-- Main -->

<div id="main">
	<div align="center">
		<img class="header-picture"src="images/logo@20150303.png" >
	</div>

	<div id="change"><?php include_once('eventList.php'); ?></div>

	<div class="button" type="button" id="back" onclick="loadAllEvent()">Home</div>
<?php
	if($logged==1){
?>
	<div class="button" type="button" id="back" onclick="loadNotification(<?php echo $_SESSION['id']; ?>)">Notification</div>
<?php
	}
?>
</div>

<?php
	if($logged==1){
?>
<div class="createbutton">
	<button type="button" class="btn btn-default btn-circle btn-lg" onclick="clickCreateEvent(<?php //echo $_SESSION['id']; ?>)">
	<i class="glyphicon glyphicon-plus">E</i>
	</button>
</div>

<!-- <div class="createbutton">
	<button type="button" class="btn btn-default btn-circle btn-lg" onclick="clickCreateReview(<?php //echo $_SESSION['id']; ?>)">
	<i class="glyphicon glyphicon-plus">R</i>
	</button>
</div> -->
<?php
	}
?>
<div class="eventcomment">
	<div id="notiBox"></div>
</div>

<script src="mainScript.js"></script>
<script src="eventScript.js"></script>
<script src="reviewScript.js"></script>
<script src="commentScript.js"></script>
<script src="messageScript.js"></script>