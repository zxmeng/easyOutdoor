//Define the global variable: http_request
var http_request;

//create the Ajax object
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
				if(res != ""){
					//sending success, write the message into 'messageBox'
					document.getElementById("sendBox").value = "";  //Clear the sendBox
				}
			}
		}
        http_request.send(data);
    }
}


function buttonOnClick() { 
	if (event.keyCode == 13) { 
		document.getElementById("subbutton").click(); 
		return false; 
	}
}

var guid = 0;
var geid = 0;

setInterval(viewMessage, 500); //send the request twice a second
function viewMessage(uid, eid){
	var http_request = createAjaxObject();
	if (http_request){
		if (guid != 0){
			var data = "eid=" + geid + "&uid=" + guid;
		}
		else if (!(typeof uid === 'undefined')) {
			var data = "eid=" + eid + "&uid=" + uid;
			guid = uid;
			geid = eid;
		}
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