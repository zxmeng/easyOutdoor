
function clickCreateReview(uid)
{
    // user wants to create a review
    // use ajax to change the page content 
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
    // send datat to server
    xmlhttp.open("GET","goToCreateReview.php"+data, true);
    xmlhttp.send();
}

function clickEdit_R(pid, uid)
{
    // user wants to edit a review
    // use ajax to change the page content 
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
    
    var data = "?pid=" + pid + "&uid=" + uid;
    // send datat to server
    xmlhttp.open("GET","goToEditReview.php"+data, true);
    xmlhttp.send();
}

function clickUpdate_R(pid, uid){

    // user submit the updated information
    // check whether all required informations are provided
    if( document.getElementById("e_title").value == "" ||
        document.getElementById("e_time").value == "" ||
        document.getElementById("e_district").value == "" ||
        document.getElementById("e_venue").value == "" ||
        document.getElementById("e_parNo").value == "" ||
        document.getElementById("e_description").value == ""
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
          // server will return the path storing the image in server
          updateReview(pid,uid,name);
        } else {
          document.getElementById("output").innerHTML = "Error " + xmlhttp.status + " occurred uploading your file.<br \/>";
        }
    };

    // upload image first
    xmlhttp.open("POST", "upload.php", true);
    xmlhttp.send(fileData);

}

function updateReview(pid,uid,name){
    // update database and display the updated review
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
    // format the date
    var time_iso = document.getElementById("e_time").value;
    var time = time_iso.replace('T', ' ');;

    var district = document.getElementById("e_district").value;
    var venue = document.getElementById("e_venue").value;
    var parNo = document.getElementById("e_parNo").value;
    var description = document.getElementById("e_description").value;
    var image = name;

    var data = "?pid=" + pid + "&uid=" + uid + "&title=" + title + "&time=" + time 
             + "&district=" + district + "&venue=" + venue + "&parNo=" 
             + parNo + "&description=" + description + "&image=" + image;

    // send datat to server
    xmlhttp.open("GET","uploadUpdatedReview.php"+data, true);
    xmlhttp.send();  
}

function clickPost(uid){

    // user submit the information
    // check whether all required informations are provided
    if( document.getElementById("r_title").value == "" ||
        document.getElementById("r_time").value == "" ||
        document.getElementById("r_district").value == "" ||
        document.getElementById("r_venue").value == "" ||
        document.getElementById("r_parNo").value == "" ||
        document.getElementById("r_description").value == ""
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
          // server will return the path storing the image in server
          createReview(uid,name);
        } else {
          document.getElementById("output").innerHTML = "Error " + xmlhttp.status + " occurred uploading your file.<br \/>";
        }
    };

    // upload the selected image first
    xmlhttp.open("POST", "upload.php", true);
    xmlhttp.send(fileData);

    
}

function createReview(uid, name){
    // update databse and display the created review
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
    var title = document.getElementById("r_title").value;
    // format the date
    var time_iso = document.getElementById("r_time").value;
    var time = time_iso.replace('T', ' ');;

    var district = document.getElementById("r_district").value;
    var venue = document.getElementById("r_venue").value;
    var parNo = document.getElementById("r_parNo").value;
    var description = document.getElementById("r_description").value;
    var image = name;

    var data = "?uid=" + uid + "&title=" + title + "&time=" + time 
             + "&district=" + district + "&venue=" + venue + "&parNo=" 
             + parNo + "&description=" + description + "&image=" + image;

    // send datat to server
    xmlhttp.open("GET","uploadCreatedReview.php"+data, true);
    xmlhttp.send();  

}

function clickLike_R(rid, uid)
{
    // we use value of the element to detect whether user is liking or unliking a review
    // and update database and page content accordingly

    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    var flag;

    if(document.getElementById("like_r").value == "Like"){
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                document.getElementById("like_r").value = "Unlike";
                document.getElementById("like_r").innerHTML = "Unlike";
            }
        }
        flag = 3; 
    }
    else {
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                document.getElementById("like_r").value = "Like";
                document.getElementById("like_r").innerHTML = "Like";
            }
        }
        flag = 2; 
    }
    var data = "?rid=" + rid + "&uid=" + uid + "&flag=" + flag;
    
    // send data to server
    xmlhttp.open("GET","likeClick.php"+data, true);
    xmlhttp.send();
}