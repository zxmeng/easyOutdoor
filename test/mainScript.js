function goToTop(){
    // go to top of the home page
    loadAllEvent();
    var main = document.getElementById("main")
    // locate the window to a proper position
    var rect = main.getBoundingClientRect();
    window.scrollTo(rect.left, rect.top + window.scrollY);
}

function loadEvent(eid, uid)
{
    // go to page of the detail information of event
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            var main = document.getElementById("change")
            // locate the window to a proper position
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);
        }
    }
    
    var data = "?eid=" + eid + "&uid=" + uid;
    // send datat to server
	xmlhttp.open("GET","goToEventPage.php"+data, true);
	xmlhttp.send();
}

function loadReview(pid, uid)
{
    // go to page of the detail information of review
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            var main = document.getElementById("change")
            // locate the window to a proper position
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);
        }
    }
    
    var data = "?pid=" + pid + "&uid=" + uid;
    // send datat to server
	xmlhttp.open("GET","goToReviewPage.php"+data, true);
	xmlhttp.send();
}

function loadAllEvent()
{
    // display all events
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            guid = 0;
			geid = 0;
            var main = document.getElementById("change")
            // locate the window to a proper position
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);
        }
    }

	xmlhttp.open("GET","goToEventList.php", true);
	xmlhttp.send();
}

function loadCalendar()
{
    // go to search by calendar
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            var main = document.getElementById("change")
            // locate the window to a proper position
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);
        }
    }

	xmlhttp.open("GET","goToCalendar.php", true);
	xmlhttp.send();
}

function loadMap()
{
    // go to search by map
    document.getElementById("change").innerHTML= "<div id=\"map\" style=\"width: 100%; height: 500px;border: solid 4px #efefef;\"></div><div id=\"mapResult\"></div>";
    initialize();
    var main = document.getElementById("change")
    // locate the window to a proper position
    var rect = main.getBoundingClientRect();
    window.scrollTo(rect.left, rect.top + window.scrollY);
}

function loadRecommendation()
{
    // go to recommendation page
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            var main = document.getElementById("change")
            // locate the window to a proper position
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);
        }
    }

	xmlhttp.open("GET","goToRecommendation.php", true);
	xmlhttp.send();
}

function loadNotification(uid)
{
    // retrieve notifications from server and display them
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("notiBox").innerHTML= xmlhttp.responseText;
        }
    }    
    var data = "?uid=" + uid;
    // send datat to server
	xmlhttp.open("GET","goToNotification.php"+data, true);
	xmlhttp.send();

}

function clickNotification(nid, aid, bid, flag){
    // if user click on a notification, update the page content
    // and disable the notification, i.e. mark it as readed
    switch(flag){
        case 0:
            loadEvent(aid, bid);
            disableNoti(nid);
            break;

        case 1:
            loadPersonalHomepage(aid, bid);
            disableNoti(nid);
            break;
    }

}

function disableNoti(nid){
    // mark the notification as readed
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    var data = "?nid=" + nid;       
    // send datat to server
    xmlhttp.open("GET","disableNotification.php"+data, true);
    xmlhttp.send();
}

function addLoadEvent(func) {
    // add a onload function
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
