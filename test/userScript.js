function clickFriend(uid){

	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            var main = document.getElementById("change")
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);
        }
    }
    var data = "?uid=" + uid;

	xmlhttp.open("GET","goToFriendPage.php"+data, true);
	xmlhttp.send();
}


function showFriendDetail(uid, auid){

	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("frienddetail").innerHTML= xmlhttp.responseText;
            var main = document.getElementById("frienddetail")
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);
        }
    }
    var data = "?uid=" + uid + "&auid=" + auid + "&flag=small";

	xmlhttp.open("GET","goToFriendDetail.php"+data, true);
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
                document.getElementById("follow").innerHTML = "Unfollow";
	        }
	    }
	    flag = 1; 
    }
    else {
    	xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	            document.getElementById("follow").value = "Follow";
                document.getElementById("follow").innerHTML = "Follow";
	        }
	    }
	    flag = 0; 
    }

    var data = "?uid=" + uid + "&auid=" + auid + "&flag=" + flag;

	xmlhttp.open("GET","followClick.php"+data, true);
	xmlhttp.send();
}

function showUserEvents(auid, uid, flag) {

	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("userEvent").innerHTML= xmlhttp.responseText;
            var main = document.getElementById("userEvent")
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.right, rect.top + window.scrollY);
        }
    }
    var data = "?auid=" + auid +"&uid=" + uid + "&flag=" + flag;

	xmlhttp.open("GET","goToUserEvents.php"+data, true);
	xmlhttp.send();
}


function clickEditProfile(uid){

	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            var main = document.getElementById("change")
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);

        }
    }

    var data = "?uid=" + uid;

	xmlhttp.open("GET","goToEditProfile.php"+data, true);
	xmlhttp.send();

}

function clickUpdateProfile(uid){

  if( document.getElementById("nickname").value == "" ||
      document.getElementById("phone").value == "" ||
      document.getElementById("description").value == ""
    ){
    window.alert("Please insert all fields in the form!");
    return;
  }


    var fileData = new FormData(document.forms.namedItem("imageFile"));

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function(event) {
        if (xmlhttp.status == 200) {
          var name = xmlhttp.responseText;
          updateProfile(uid,name);
        } else {
          document.getElementById("output").innerHTML = "Error " + xmlhttp.status + " occurred uploading your file.<br \/>";
        }
    };

    xmlhttp.open("POST", "upload.php", true);
    xmlhttp.send(fileData);

}

function updateProfile(uid,name){

    var xmlhttp;
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            var main = document.getElementById("change")
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

    xmlhttp.open("GET","uploadUpdatedProfile.php"+data, true);
    xmlhttp.send();  
}

function loadPersonalHomepage(uid, auid){

    var xmlhttp;
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            var main = document.getElementById("change")
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);
        }
    }

    var data = "?uid=" + uid + "&auid=" + auid + "&flag=full";

    xmlhttp.open("GET","goToFriendDetail.php"+data, true);
    xmlhttp.send();
}