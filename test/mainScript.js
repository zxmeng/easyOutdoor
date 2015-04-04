function loadEvent(eid, uid)
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
			document.getElementById("back").innerHTML = "Back";
        }
    }
    	var data = "?eid=" + eid + "&uid=" + uid;
	xmlhttp.open("GET","goToEventPage.php"+data, true);
	//window.alert(data);
	xmlhttp.send();
}

function loadAllEvent()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            document.getElementById("back").innerHTML = "Home";
            //backFlag = 1;
        }
    }
	xmlhttp.open("GET","goToEventList.php", true);
	//window.alert(data);
	xmlhttp.send();
}

function loadCalendar()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            document.getElementById("back").innerHTML = "Home";
            //backFlag = 2;
        }
    }
	xmlhttp.open("GET","goToCalendar.php", true);
	//window.alert(data);
	xmlhttp.send();
}

function loadMap()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            document.getElementById("back").innerHTML = "Home";
            //backFlag = 3;
        }
    }
	xmlhttp.open("GET","goToMap.php", true);
	//window.alert(data);
	xmlhttp.send();
}

function loadRecommendation()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	//window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
            document.getElementById("back").innerHTML = "Home";
            //backFlag = 4;
        }
    }
	xmlhttp.open("GET","goToRecommendation.php", true);
	//window.alert(data);
	xmlhttp.send();
}

function clickCreate(uid)
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

// $(':file').change(function(){
//     var file = this.files[0];
//     var name = file.name;
//     var size = file.size;
//     var type = file.type;
//     //Your validation
// });

// $(':button').click(function(){
//     var formData = new FormData($('form')[0]);
//     $.ajax({
//         url: 'upload.php',  //Server script to process data
//         type: 'POST',
//         xhr: function() {  // Custom XMLHttpRequest
//             var myXhr = $.ajaxSettings.xhr();
//             if(myXhr.upload){ // Check if upload property exists
//                 myXhr.upload.addEventListener('progress',progressHandlingFunction, false); // For handling the progress of the upload
//             }
//             return myXhr;
//         },
//         //Ajax events
//         beforeSend: beforeSendHandler,
//         success: completeHandler,
//         error: errorHandler,
//         // Form data
//         data: formData,
//         //Options to tell jQuery not to process data or worry about content-type.
//         cache: false,
//         contentType: false,
//         processData: false
//     });
// });


function clickUpdate(eid, uid){
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
    var image = document.getElementById("e_image").value;
    window.alert(image);
    var data = "?eid=" + eid + "&uid=" + uid + "&title=" + title + "&time=" + time 
             + "&district=" + district + "&venue=" + venue + "&limit=" 
             + limit + "&description=" + description + "&image=" + image;

    xmlhttp.open("GET","uploadUpdatedEvent.php"+data, true);
    //window.alert(data);
    xmlhttp.send();  
}

function clickSubmit(uid){
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
    var image = document.getElementById("c_image").value;

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
