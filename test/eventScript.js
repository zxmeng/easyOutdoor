function clickCreateEvent(uid)
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
			document.getElementById("back").innerHTML = "Cancel";
			//backFlag = 1;
        }
    }
    
    var data = "?uid=" + uid;

	xmlhttp.open("GET","goToCreateEvent.php"+data, true);
	//window.alert(data);
	xmlhttp.send();
}

function clickEdit(eid, uid)
{
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    //window.alert("Here!");
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            document.getElementById("back").innerHTML = "Cancel";
            //backFlag = 0;
        }
    }
    
    var data = "?eid=" + eid + "&uid=" + uid;

    xmlhttp.open("GET","goToEditEvent.php"+data, true);
    //window.alert(data);
    xmlhttp.send();
}

function clickUpdate(eid, uid){

  if( document.getElementById("e_title").value == "" ||
      document.getElementById("e_time").value == "" ||
      document.getElementById("e_district").value == "" ||
      document.getElementById("e_venue").value == "" ||
      document.getElementById("e_description").value == ""
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
          updateEvent(eid,uid,name);
          //return name;
        } else {
          document.getElementById("output").innerHTML = "Error " + xmlhttp.status + " occurred uploading your file.<br \/>";
          //return null;
        }
    };

    xmlhttp.open("POST", "upload.php", true);
    xmlhttp.send(fileData);

}

function updateEvent(eid,uid,name){

    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    //window.alert("Here!");
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            document.getElementById("back").innerHTML = "Back";
        }
    }
    
    var title = document.getElementById("e_title").value;

    var time_iso = document.getElementById("e_time").value;
    var time = time_iso.replace('T', ' ');;
    //window.alert(time);
    var district = document.getElementById("e_district").value;
    var venue = document.getElementById("e_venue").value;
    var limit = document.getElementById("e_limitation").value;
    var description = document.getElementById("e_description").value;
    var image = name;
    //window.alert(image);
    var data = "?eid=" + eid + "&uid=" + uid + "&title=" + title + "&time=" + time 
             + "&district=" + district + "&venue=" + venue + "&limit=" 
             + limit + "&description=" + description + "&image=" + image;

    xmlhttp.open("GET","uploadUpdatedEvent.php"+data, true);
    //window.alert(data);
    xmlhttp.send();  
}


function clickSubmit(uid){

    if( document.getElementById("c_title").value == "" ||
        document.getElementById("c_time").value == "" ||
        document.getElementById("c_district").value == "" ||
        document.getElementById("c_venue").value == "" ||
        document.getElementById("c_description").value == ""
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
          createEvent(uid,name);
          //return name;
        } else {
          document.getElementById("output").innerHTML = "Error " + xmlhttp.status + " occurred uploading your file.<br \/>";
          //return null;
        }
    };

    xmlhttp.open("POST", "upload.php", true);
    xmlhttp.send(fileData);

}


function createEvent(uid, name){
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    //window.alert("Here!");
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            document.getElementById("back").innerHTML = "Back";
        }
    }
    var title = document.getElementById("c_title").value;

    var time_iso = document.getElementById("c_time").value;
    var time = time_iso.replace('T', ' ');;
    //window.alert(time);
    var district = document.getElementById("c_district").value;
    var venue = document.getElementById("c_venue").value;
    var limit = document.getElementById("c_limitation").value;
    var description = document.getElementById("c_description").value;
    var image = name;

    var data = "?uid=" + uid + "&title=" + title + "&time=" + time 
             + "&district=" + district + "&venue=" + venue + "&limit=" 
             + limit + "&description=" + description + "&image=" + image;

    xmlhttp.open("GET","uploadCreatedEvent.php"+data, true);
    //window.alert(data);
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

var ruid = 0;


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