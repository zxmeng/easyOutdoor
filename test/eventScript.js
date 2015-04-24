function clickCreateEvent(uid)
{
    // user wants to create an event
    // use ajax to change the page content to the createEvent page
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
    
    var data = "?uid=" + uid;
    // send the uid of this user to server
	xmlhttp.open("GET","goToCreateEvent.php"+data, true);
	xmlhttp.send();
}

function clickEdit(eid, uid)
{
    // user wants to edit an event
    // use ajax to change the page content to the editEvent page
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
    // send the uid of this user and the eid of the event to server
    xmlhttp.open("GET","goToEditEvent.php"+data, true);
    xmlhttp.send();
}

function clickUpdate(eid, uid){

    // user submit the updated information
    // check whether all required informations are provided
    if( document.getElementById("e_title").value == "" ||
        document.getElementById("e_time").value == "" ||
        document.getElementById("e_district").value == "" ||
        document.getElementById("e_venue").value == "" ||
        document.getElementById("e_description").value == ""
    ){
        window.alert("Please insert all fields in the form!");
        return;
    }

    // use FormData to get the image file
    var fileData = new FormData(document.forms.namedItem("imageFile"));
    // use ajax to update the page content
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function(event) {
        if (xmlhttp.status == 200) {
          var name = xmlhttp.responseText;
          // server will return the path storing the image in the server
          // call updateEvent to update the database
          updateEvent(eid,uid,name);
        } else {
          document.getElementById("output").innerHTML = "Error " + xmlhttp.status + " occurred uploading your file.<br \/>";
        }
    };

    // send datat to server, upload the image first
    xmlhttp.open("POST", "upload.php", true);
    xmlhttp.send(fileData);

}

function updateEvent(eid,uid,name){
    // update database and update the page content to display the updated event information
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
    
    var title = document.getElementById("e_title").value;
    //format the date
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
    //send the data to server
    xmlhttp.open("GET","uploadUpdatedEvent.php"+data, true);
    xmlhttp.send();  
}


function clickSubmit(uid){

    // user submit the information
    // check whether all required informations are provided
    if( document.getElementById("c_title").value == "" ||
        document.getElementById("c_time").value == "" ||
        document.getElementById("c_district").value == "" ||
        document.getElementById("c_venue").value == "" ||
        document.getElementById("c_description").value == ""
    ){
        window.alert("Please insert all fields in the form!");
        return;
    }

    // use FormData to get the image file
	var fileData = new FormData(document.forms.namedItem("imageFile"));
    // use ajax to update the page content
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function(event) {
        if (xmlhttp.status == 200) {
          var name = xmlhttp.responseText;
          // server will return the path storing the image in the server
          // call createEvent to update the database
          createEvent(uid,name);
        } else {
          document.getElementById("output").innerHTML = "Error " + xmlhttp.status + " occurred uploading your file.<br \/>";
        }
    };

    // send datat to server, upload the image first
    xmlhttp.open("POST", "upload.php", true);
    xmlhttp.send(fileData);

}

function createEvent(uid, name){
    // update database and update the page content to display the created event information
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
    var title = document.getElementById("c_title").value;
    // format the date
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
    //send the data to server
    xmlhttp.open("GET","uploadCreatedEvent.php"+data, true);
    xmlhttp.send();  

}

function clickLike(eid, uid)
{
    // we use the value of the html element to detect whether user is liking or unliking
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	var flag;

	if(document.getElementById("like").value == "Like"){
		xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                // update the value
	            document.getElementById("like").value = "Unlike";
                document.getElementById("like").innerHTML = "Unlike";
	        }
	    }
	    flag = 1; 
    }
    else {
    	xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                // update the value
	            document.getElementById("like").value = "Like";
                document.getElementById("like").innerHTML = "Like";
	        }
	    }
	    flag = 0; 
    }
    //send the data to server to update database
    var data = "?eid=" + eid + "&uid=" + uid + "&flag=" + flag;
	xmlhttp.open("GET","likeClick.php"+data, true);
	xmlhttp.send();
}

function clickJoin(eid, uid)
{
    // we use the value of the html element to detect whether user is joining or unjoining
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	var flag;

	if(document.getElementById("join").value == "Join"){
		xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                // update the value
	            document.getElementById("join").value = "Unjoin";
                document.getElementById("join").innerHTML = "Unjoin";
                // once user join the event, the page will jump to the chatroom page
                clickChatroom(eid, uid);
	        }
	    }
	    flag = 1; 
    }
    else {
    	xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                // update the value
	            document.getElementById("join").value = "Join";
                document.getElementById("join").innerHTML = "Join";
                // hide the chatroom button
                document.getElementById("chatroom").style.visibility = "hidden";
	        }
	    }
	    flag = 0;
    }
    //send the data to server to update database
    var data = "?eid=" + eid + "&uid=" + uid + "&flag=" + flag;
	xmlhttp.open("GET","joinClick.php"+data, true);
	xmlhttp.send();
}

function previewImage(flag) {
    // preview the selected image
    // because in different pages the id is different, we use flag to distinguish them
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
    // enter the chatroom
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            addLoadEvent(viewMessage(uid, eid));
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            var main = document.getElementById("change")
            // locate the window to a proper position
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.bottom + window.scrollY);
        }
    }
    
    var data = "?eid=" + eid + "&uid=" + uid;
    //send the data to server
    xmlhttp.open("GET","goToChatroom.php"+data, true);
    xmlhttp.send();
}
