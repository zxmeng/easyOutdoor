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

var ruid = 0;

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

// function clickEdit(eid)
// {
// 	var xmlhttp;
// 	xmlhttp = new XMLHttpRequest();
// 	//window.alert("Here!");
// 	xmlhttp.onreadystatechange=function() {
//         if (xmlhttp.readyState==4 && xmlhttp.status==200) {
//             document.getElementById("change").innerHTML= xmlhttp.responseText;
// 			document.getElementById("back").innerHTML = "Back";
//         }
//     }
//     	var data = "?eid=" + eid + "&uid=" + uid;
// 	xmlhttp.open("GET","goToEventPage.php"+data, true);
// 	//window.alert(data);
// 	xmlhttp.send();
// }

function clickLike(eid, uid)
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	var flag;

	if(document.getElementById("like").value == "Like"){
		xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	            document.getElementById("like").value = "Unlike";
	        }
	    }
	    flag = 1; 
    }
    else {
    	xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	            document.getElementById("like").value = "Like";
	        }
	    }
	    flag = 0; 
    }
    var data = "?eid=" + eid + "&uid=" + uid + "&flag=" + flag;
	xmlhttp.open("GET","likeClick.php"+data, true);
	//window.alert(data);
	xmlhttp.send();
}

function clickJoin(eid, uid)
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	var flag;

	if(document.getElementById("join").value == "Join"){
		xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	            document.getElementById("join").value = "Unjoin";
	        }
	    }
	    flag = 1; 
    }
    else {
    	xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	            document.getElementById("join").value = "Join";
	        }
	    }
	    flag = 0; 
    }
    var data = "?eid=" + eid + "&uid=" + uid + "&flag=" + flag;
	xmlhttp.open("GET","joinClick.php"+data, true);
	//window.alert(data);
	xmlhttp.send();
}

function createAjaxObject(){
    if(window.ActiveXObject){
        // code for IE6, IE5
        var newRequest = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        // code for IE7+, Firefox, Chrome, Opera, Safari
        var newRequest = new XMLHttpRequest();
    }
    return newRequest;
}

function sendComment(eid, suid){
	// alert("function");
	var http_request = createAjaxObject();
    if(http_request){
        var content = document.getElementById("commentBox").value;
        if (content == "") {
        	alert ("Please enter the comment content");
        	return;
        }

        var data = "suid=" + suid+ "&eid=" + eid + "&content=" + content + "&ruid=" + ruid;
        // alert("data = " + data);

        http_request.open("GET", "sendComment.php?"+data, true);
        http_request.onreadystatechange = function(){
			if(http_request.readyState == 4 && http_request.status == 200){
				var res = http_request.responseText;
				if(res != ""){
					document.getElementById("commentBox").value = "";  //Clear the commentBox
					document.getElementById("friendList").innerHTML = ""; //Close the friendList
					ruid = 0; // reset the global variable
				}
			}
		}
        http_request.send();
        
    }
}

function showFriendList(uid){
	var http_request = createAjaxObject();
	if(http_request){
		var data = "uid=" + uid;

		if (window.XMLHttpRequest){ // code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("friendList").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "goToFriendList.php?"+data, true);
		xmlhttp.send();
	}
}

function atUser(uid){
	ruid = uid;
	// alert("ruid = "+ruid);
}

</script>

