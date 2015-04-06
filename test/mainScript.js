function loadEvent(eid, uid)
{
	// window.alert("Here!");
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
        }
    }
    
    var data = "?eid=" + eid + "&uid=" + uid;

	xmlhttp.open("GET","goToEventPage.php"+data, true);
	// window.alert(data);
	xmlhttp.send();
}

function loadAllEvent()
{
	// alert("Into load");
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            guid = 0;
			geid = 0;
        }
    }

	xmlhttp.open("GET","goToEventList.php", true);
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
        }
    }

	xmlhttp.open("GET","goToCalendar.php", true);
	//window.alert(data);
	xmlhttp.send();
}

function loadMap()
{
    document.getElementById("change").innerHTML= "<div id=\"map\" style=\"width: 500px; height: 400px;\"></div>";
    initialize();
}

function loadRecommendation()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
        }
    }

	xmlhttp.open("GET","goToRecommendation.php", true);
	//window.alert(data);
	xmlhttp.send();
}

var notiFlag = 0;

function loadNotification(uid)
{
	// window.alert("HAHA");
	if(notiFlag==0){
		var xmlhttp;
		xmlhttp = new XMLHttpRequest();
		// window.alert("Here!");

		xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	            document.getElementById("notiBox").innerHTML= xmlhttp.responseText;
				notiFlag = 1;
	        }
	    }    
	    var data = "?uid=" + uid;

		// window.alert(data);		
		
		xmlhttp.open("GET","goToNotification.php"+data, true);
		xmlhttp.send();
	}

	else{
		document.getElementById("notiBox").innerHTML = "";
		notiFlag = 0;
	}
}
