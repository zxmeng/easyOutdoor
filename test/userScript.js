function clickFriend(uid){

	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
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
    var data = "?uid=" + uid + "&auid=" + auid + "&flag=small";
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


function clickEditProfile(uid){

	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
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
    window.alert("Please check!");
    return;
  }


    var fileData = new FormData(document.forms.namedItem("imageFile"));

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function(event) {
        if (xmlhttp.status == 200) {
          //oOutput.innerHTML = "Uploaded!";
          var name = xmlhttp.responseText;
          //window.alert(name);
          updateProfile(uid,name);
          //return name;
        } else {
          document.getElementById("output").innerHTML = "Error " + xmlhttp.status + " occurred uploading your file.<br \/>";
          //return null;
        }
    };

    xmlhttp.open("POST", "upload.php", true);
    xmlhttp.send(fileData);

}

function updateProfile(uid,name){

    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    //window.alert("Here!");
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            document.getElementById("back").innerHTML = "Home";
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
        }
    }
    var data = "?uid=" + uid + "&auid=" + auid + "&flag=full";
    // alert(data);

    xmlhttp.open("GET","goToFriendDetail.php"+data, true);
    //window.alert(data);
    xmlhttp.send();
}