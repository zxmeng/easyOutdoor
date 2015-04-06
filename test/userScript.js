function clickFriend(uid){

	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            // document.getElementById("back").innerHTML = "Home";
            //backFlag = 1;
        }
    }
    var data = "?uid=" + uid;
    // alert(data);

	xmlhttp.open("GET","goToFriendPage.php"+data, true);
	//window.alert(data);
	xmlhttp.send();
}


function showFriendDetail(uid, auid){
	// alert("function!");
	// alert(auid);
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("frienddetail").innerHTML= xmlhttp.responseText;
        }
    }
    var data = "?uid=" + uid + "&auid=" + auid;
    // alert(data);

	xmlhttp.open("GET","goToFriendDetail.php"+data, true);
	//window.alert(data);
	xmlhttp.send();
}

function clickFollow(uid, auid){
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	var flag;

	if(document.getElementById("follow").value == "Follow"){
		xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	            document.getElementById("follow").value = "Unfollow";
	        }
	    }
	    flag = 1; 
    }
    else {
    	xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	            document.getElementById("follow").value = "Follow";
	        }
	    }
	    flag = 0; 
    }

    var data = "?uid=" + uid + "&auid=" + auid + "&flag=" + flag;
	xmlhttp.open("GET","followClick.php"+data, true);
	//window.alert(data);
	xmlhttp.send();
}

function showUserEvents(uid, flag) {
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("userEvent").innerHTML= xmlhttp.responseText;
        }
    }
    var data = "?uid=" + uid + "&flag=" + flag;

	xmlhttp.open("GET","goToUserEvents.php"+data, true);
	//window.alert(data);
	xmlhttp.send();
}
