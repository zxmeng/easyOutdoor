<!-- Main -->

<div id="main">
	<div align="center">
		<img class="header-picture"src="images/logo@20150303.png" >
	</div>

	<div id="change">
		<?php include_once('eventList.php'); ?>
	</div>

	<div class="button" type="button" id="back" onclick="loadEventList()">
		Fresh
	</div>

</div>


<script>

function loadEvent(eid, uid)
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
			document.getElementById("back").innerHTML = "Back";
        }
    }
    	var data = "?eid=" + eid + "&uid=" + uid;
	xmlhttp.open("GET","goToEventPage.php"+data, true);
	//window.alert(data);
	xmlhttp.send();
}

function loadEventList()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            document.getElementById("back").innerHTML = "Fresh";
        }
    }
	xmlhttp.open("GET","goToMainPage.php", true);
	//window.alert(data);
	xmlhttp.send();
}

function loadAllEvent()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            //document.getElementById("back").innerHTML = "Fresh";
        }
    }
	xmlhttp.open("GET","goToMainPage.php", true);
	//window.alert(data);
	xmlhttp.send();
}

function loadCalendar()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            //document.getElementById("back").innerHTML = "Fresh";
        }
    }
	xmlhttp.open("GET","goToCalendar.php", true);
	//window.alert(data);
	xmlhttp.send();
}

function loadMap()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            //document.getElementById("back").innerHTML = "Fresh";
        }
    }
	xmlhttp.open("GET","goToMap.php", true);
	//window.alert(data);
	xmlhttp.send();
}

function loadReference()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            //document.getElementById("back").innerHTML = "Fresh";
        }
    }
	xmlhttp.open("GET","goToReference.php", true);
	//window.alert(data);
	xmlhttp.send();
}

</script>

