<?php
	require_once('EventClass.php');
?>


<div>

<h2>Search by Calendar</h2>

<div class="field">
	<!-- <label for='password'>Time</label> -->
	<input type="date" name="time" id="dateSearch">
	<input type="button" value="Search" onclick="calendarSearch()">
</div>  


<div id="searchResult"></div>


</div>