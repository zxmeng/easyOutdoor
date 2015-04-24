<?php
	require_once('EventClass.php');
?>


<div>



<div class="field" align="center">
	<h2>Search by Calendar - 
	<input type="date" name="time" id="dateSearch">
	<input type="button" value="Search" onclick="calendarSearch()">
	<!-- choose a date and search, then display results accordingly -->
	</h2>
</div>  



<div id="searchResult"></div>
<!-- the innerHTML of this div will be replaced by the search results-->

</div>