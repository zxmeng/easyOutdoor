// create the Ajax object according to the browser
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

function sendMessage(uid, eid){
    var http_request = createAjaxObject();
    if(http_request){
        var content = document.getElementById("sendBox").value;
        // If the send box is empty, show error message and return
        if (content == "") {
        	alert ("Please enter the message content");
        	return;
        }

        var data = "uid=" + uid + "&eid=" + eid + "&content=" + content;

        http_request.open("POST", "sendMessage.php", true);
        http_request.setRequestHeader("content-type", "application/x-www-form-urlencoded");

        http_request.onreadystatechange = function(){
			if(http_request.readyState == 4 && http_request.status == 200){
				var res = http_request.responseText;
				if(res != ""){ //sending success
					document.getElementById("sendBox").value = "";  //Clear the sendBox
				}
			}
		}
        http_request.send(data);
    }
}

function buttonOnClick() { 
	if (event.keyCode == 13) { 
		// When the enter key being clicked, invoke the onclick function of subbutton
		document.getElementById("subbutton").click(); 
		return false; 
	}
}

// Global variable to indicate current user id and current event id
var guid = 0;
var geid = 0;

setInterval(viewMessage, 500); // invoke the viewMessage function twice a second
function viewMessage(uid, eid){
	var http_request = createAjaxObject();
	if (http_request){
		if (!(typeof uid === 'undefined')) {
			// The user enters a chatroom for the first time
			var data = "eid=" + eid + "&uid=" + uid;
			guid = uid;
			geid = eid;
		}
		else if (guid != 0){
			// The user has entered a chatroom (we do not care if he leave the chatroom div or not)
			var data = "eid=" + geid + "&uid=" + guid;
		}
		// the current user has not entered any chatroom
		else return;

		http_request.open("GET", "goToMessageViewer.php?"+data, true);
		http_request.onreadystatechange = function(){
			if(http_request.readyState == 4 && http_request.status == 200){
				document.getElementById("messageViewer").innerHTML = http_request.responseText;				
			}
		}
		http_request.send();
	}
}
