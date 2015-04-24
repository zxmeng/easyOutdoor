function clickFriend(uid){
    // display the friends of this user
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            // Change scroll position
            var main = document.getElementById("change");
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);
        }
    }
    var data = "?uid=" + uid;
    // send data to server
	xmlhttp.open("GET","goToFriendPage.php"+data, true);
	xmlhttp.send();
}


function showFriendDetail(uid, auid){
    // display the personal homepage of this friend
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("frienddetail").innerHTML= xmlhttp.responseText;
            // Change scroll position
            var main = document.getElementById("frienddetail");
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);
        }
    }
    var data = "?uid=" + uid + "&auid=" + auid + "&flag=small";
    // send data to server
	xmlhttp.open("GET","goToFriendDetail.php"+data, true);
	xmlhttp.send();
}

function clickFollow(uid, auid){
    // user (un)followed someone, update database
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	var flag;

	if(document.getElementById("follow").value == "Follow"){
		xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                // follow succeed, change the button value
	            document.getElementById("follow").value = "Unfollow";
                document.getElementById("follow").innerHTML = "Unfollow";
	        }
	    }
	    flag = 1; 
    }
    else {
    	xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                // unfollow succeed, change the button value
	            document.getElementById("follow").value = "Follow";
                document.getElementById("follow").innerHTML = "Follow";
	        }
	    }
	    flag = 0; 
    }

    var data = "?uid=" + uid + "&auid=" + auid + "&flag=" + flag;
    // send data to server
	xmlhttp.open("GET","followClick.php"+data, true);
	xmlhttp.send();
}

function showUserEvents(auid, uid, flag) {
    // display the created events, joined events or created reviews, indicated by flag
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("userEvent").innerHTML= xmlhttp.responseText;
            // Change scroll position
            var main = document.getElementById("userEvent");
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.right, rect.top + window.scrollY);
        }
    }
    var data = "?auid=" + auid +"&uid=" + uid + "&flag=" + flag;
    // send data to server
	xmlhttp.open("GET","goToUserEvents.php"+data, true);
	xmlhttp.send();
}


function clickEditProfile(uid){
    // user wants to edit the profile
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            // Change scroll position
            var main = document.getElementById("change");
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);

        }
    }

    var data = "?uid=" + uid;
    // send data to server
	xmlhttp.open("GET","goToEditProfile.php"+data, true);
	xmlhttp.send();

}

function clickUpdateProfile(uid){
    // check whether all required informations are provided
    if( document.getElementById("nickname").value == "" ||
        document.getElementById("phone").value == "" ||
        document.getElementById("description").value == ""
    ){
        window.alert("Please insert all fields in the form!");
        return;
    }
    // use formdata to get the selected image
    var fileData = new FormData(document.forms.namedItem("imageFile"));
    // use ajax to update the page content
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function(event) {
        if (xmlhttp.status == 200) {
            var name = xmlhttp.responseText;
            //server will return the path storing the selected image in server
            updateProfile(uid,name);
        } else {
            document.getElementById("output").innerHTML = "Error " + xmlhttp.status + " occurred uploading your file.<br \/>";
        }
    };

    // upload the image first
    xmlhttp.open("POST", "upload.php", true);
    xmlhttp.send(fileData);

}

function updateProfile(uid,name){
    // update database
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            var main = document.getElementById("change")
            // Change scroll position
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);
        }
    }
    
    var nickname = document.getElementById("nickname").value;
    var phone = document.getElementById("phone").value;
    var description = document.getElementById("description").value;
    var image = name;

    var data = "?uid=" + uid + "&nickname=" + nickname + "&phone=" + phone 
             + "&description=" + description + "&image=" + image;
    // send data to server
    xmlhttp.open("GET","uploadUpdatedProfile.php"+data, true);
    xmlhttp.send();  
}

function loadPersonalHomepage(uid, auid){
    // display the personal homebage
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            // Change scroll position
            var main = document.getElementById("change");
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);
        }
    }

    var data = "?uid=" + uid + "&auid=" + auid + "&flag=full";
    // send data to server
    xmlhttp.open("GET","goToFriendDetail.php"+data, true);
    xmlhttp.send();
}