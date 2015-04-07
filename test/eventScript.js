function clickCreateEvent(uid)
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
        }
    }
    
    var data = "?uid=" + uid;

	xmlhttp.open("GET","goToCreateEvent.php"+data, true);
	xmlhttp.send();
}

function clickEdit(eid, uid)
{
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
        }
    }
    
    var data = "?eid=" + eid + "&uid=" + uid;

    xmlhttp.open("GET","goToEditEvent.php"+data, true);
    xmlhttp.send();
}

function clickUpdate(eid, uid){

  if( document.getElementById("e_title").value == "" ||
      document.getElementById("e_time").value == "" ||
      document.getElementById("e_district").value == "" ||
      document.getElementById("e_venue").value == "" ||
      document.getElementById("e_description").value == ""
    ){
    window.alert("Please insert all fields in the form!");
    return;
  }


    var fileData = new FormData(document.forms.namedItem("imageFile"));

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function(event) {
        if (xmlhttp.status == 200) {
          var name = xmlhttp.responseText;
          updateEvent(eid,uid,name);
        } else {
          document.getElementById("output").innerHTML = "Error " + xmlhttp.status + " occurred uploading your file.<br \/>";
        }
    };

    xmlhttp.open("POST", "upload.php", true);
    xmlhttp.send(fileData);

}

function updateEvent(eid,uid,name){

    var xmlhttp;
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
        }
    }
    
    var title = document.getElementById("e_title").value;

    var time_iso = document.getElementById("e_time").value;
    var time = time_iso.replace('T', ' ');;

    var district = document.getElementById("e_district").value;
    var venue = document.getElementById("e_venue").value;
    var limit = document.getElementById("e_limitation").value;
    var description = document.getElementById("e_description").value;
    var image = name;

    var data = "?eid=" + eid + "&uid=" + uid + "&title=" + title + "&time=" + time 
             + "&district=" + district + "&venue=" + venue + "&limit=" 
             + limit + "&description=" + description + "&image=" + image;

    xmlhttp.open("GET","uploadUpdatedEvent.php"+data, true);
    xmlhttp.send();  
}


function clickSubmit(uid){

    if( document.getElementById("c_title").value == "" ||
        document.getElementById("c_time").value == "" ||
        document.getElementById("c_district").value == "" ||
        document.getElementById("c_venue").value == "" ||
        document.getElementById("c_description").value == ""
    ){
        window.alert("Please insert all fields in the form!");
        return;
    }


	var fileData = new FormData(document.forms.namedItem("imageFile"));
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function(event) {
        if (xmlhttp.status == 200) {
          var name = xmlhttp.responseText;
          createEvent(uid,name);
        } else {
          document.getElementById("output").innerHTML = "Error " + xmlhttp.status + " occurred uploading your file.<br \/>";
        }
    };

    xmlhttp.open("POST", "upload.php", true);
    xmlhttp.send(fileData);

}

function createEvent(uid, name){
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
        }
    }
    var title = document.getElementById("c_title").value;

    var time_iso = document.getElementById("c_time").value;
    var time = time_iso.replace('T', ' ');;

    var district = document.getElementById("c_district").value;
    var venue = document.getElementById("c_venue").value;
    var limit = document.getElementById("c_limitation").value;
    var description = document.getElementById("c_description").value;
    var image = name;

    var data = "?uid=" + uid + "&title=" + title + "&time=" + time 
             + "&district=" + district + "&venue=" + venue + "&limit=" 
             + limit + "&description=" + description + "&image=" + image;

    xmlhttp.open("GET","uploadCreatedEvent.php"+data, true);
    xmlhttp.send();  

}

function clickLike(eid, uid)
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	var flag;

	if(document.getElementById("like").value == "Like"){
		xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	            document.getElementById("like").value = "Unlike";
                document.getElementById("like").innerHTML = "Unlike";
	        }
	    }
	    flag = 1; 
    }
    else {
    	xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	            document.getElementById("like").value = "Like";
                document.getElementById("like").innerHTML = "Like";
	        }
	    }
	    flag = 0; 
    }

    var data = "?eid=" + eid + "&uid=" + uid + "&flag=" + flag;
	xmlhttp.open("GET","likeClick.php"+data, true);
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
                document.getElementById("join").innerHTML = "Unjoin";
                clickChatroom(eid, uid);
	        }
	    }
	    flag = 1; 
    }
    else {
    	xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	            document.getElementById("join").value = "Join";
                document.getElementById("join").innerHTML = "Join";
                document.getElementById("chatroom").style.visibility = "hidden";
	        }
	    }
	    flag = 0;
    }

    var data = "?eid=" + eid + "&uid=" + uid + "&flag=" + flag;
	xmlhttp.open("GET","joinClick.php"+data, true);
	xmlhttp.send();
}

function previewImage(flag) {
   	if(flag==1){
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("e_image").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("e_img").src = oFREvent.target.result;
        };
    }
    else if(flag==0){
 		var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("c_image").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("c_img").src = oFREvent.target.result;
        };
    }
};

function clickChatroom(eid, uid)
{
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            addLoadEvent(viewMessage(uid, eid));
            document.getElementById("change").innerHTML= xmlhttp.responseText;
        }
    }
    
    var data = "?eid=" + eid + "&uid=" + uid;

    xmlhttp.open("GET","goToChatroom.php"+data, true);
    xmlhttp.send();
}
