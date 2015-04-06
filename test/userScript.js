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

	xmlhttp.open("GET","goToFriendPage.php"+data, true);
	//window.alert(data);
	xmlhttp.send();
}
