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

function loadAllEvent()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            document.getElementById("back").innerHTML = "Home";
            //backFlag = 1;
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
            document.getElementById("back").innerHTML = "Home";
            //backFlag = 2;
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
            document.getElementById("back").innerHTML = "Home";
            //backFlag = 3;
        }
    }

	xmlhttp.open("GET","goToMap.php", true);
	//window.alert(data);
	xmlhttp.send();
}

function loadRecommendation()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            document.getElementById("back").innerHTML = "Home";
            //backFlag = 4;
        }
    }

	xmlhttp.open("GET","goToRecommendation.php", true);
	//window.alert(data);
	xmlhttp.send();
}

var notiFlag = 0;

function loadNotification(uid)
{
	if(notiFlag==0){
		var xmlhttp;
		xmlhttp = new XMLHttpRequest();
		//window.alert("Here!");
		xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	            document.getElementById("notiBox").innerHTML= xmlhttp.responseText;
				notiFlag = 1;
	        }
	    }    
	    var data = "?uid=" + uid;
		xmlhttp.open("GET","goToNotification.php"+data, true);
		//window.alert(data);
		xmlhttp.send();
	}

	else{
		document.getElementById("notiBox").innerHTML = "";
		notiFlag = 0;
	}
}
