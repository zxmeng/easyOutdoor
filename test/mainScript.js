function loadEvent(eid, uid)
{

	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
        }
    }
    
    var data = "?eid=" + eid + "&uid=" + uid;

	xmlhttp.open("GET","goToEventPage.php"+data, true);
	xmlhttp.send();
}

function loadReview(pid, uid)
{

	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
        }
    }
    
    var data = "?pid=" + pid + "&uid=" + uid;

	xmlhttp.open("GET","goToReviewPage.php"+data, true);
	xmlhttp.send();
}

function loadAllEvent()
{

	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            guid = 0;
			geid = 0;
        }
    }

	xmlhttp.open("GET","goToEventList.php", true);
	xmlhttp.send();
}

function loadCalendar()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
        }
    }

	xmlhttp.open("GET","goToCalendar.php", true);
	xmlhttp.send();
}

function loadMap()
{
    document.getElementById("change").innerHTML= "<div id=\"map\" style=\"width: 100%; height: 500px;\"></div><div id=\"mapResult\"></div>";
    initialize();
}

function loadRecommendation()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
        }
    }

	xmlhttp.open("GET","goToRecommendation.php", true);
	xmlhttp.send();
}

setInterval(loadNotification, 2000); 
function loadNotification(uid)
{

	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("notiBox").innerHTML= xmlhttp.responseText;
        }
    }    
    var data = "?uid=" + uid;		
	
	xmlhttp.open("GET","goToNotification.php"+data, true);
	xmlhttp.send();

}

function addLoadEvent(func) {
  var oldonload = document.getElementById("top").onload;
  if (typeof document.getElementById("top").onload != 'function') {
    document.getElementById("top").onload = func;
  } else {
    document.getElementById("top").onload = function() {
      if (oldonload) {
        oldonload();
      }
      func();
    }
  }
}
