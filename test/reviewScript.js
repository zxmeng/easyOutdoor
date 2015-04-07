
function clickCreateReview(uid)
{
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
        }
    }
    
    var data = "?uid=" + uid;

    xmlhttp.open("GET","goToCreateReview.php"+data, true);
    xmlhttp.send();
}

function clickEdit_R(pid, uid)
{
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
        }
    }
    
    var data = "?pid=" + pid + "&uid=" + uid;

    xmlhttp.open("GET","goToEditReview.php"+data, true);
    xmlhttp.send();
}

function clickUpdate_R(pid, uid){

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


    var fileData = new FormData(document.forms.namedItem("imageFile"));
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function(event) {
        if (xmlhttp.status == 200) {
          var name = xmlhttp.responseText;
          updateReview(pid,uid,name);
        } else {
          document.getElementById("output").innerHTML = "Error " + xmlhttp.status + " occurred uploading your file.<br \/>";
        }
    };

    xmlhttp.open("POST", "upload.php", true);
    xmlhttp.send(fileData);

}

function updateReview(pid,uid,name){

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
    var parNo = document.getElementById("e_parNo").value;
    var description = document.getElementById("e_description").value;
    var image = name;

    var data = "?pid=" + pid + "&uid=" + uid + "&title=" + title + "&time=" + time 
             + "&district=" + district + "&venue=" + venue + "&parNo=" 
             + parNo + "&description=" + description + "&image=" + image;

    xmlhttp.open("GET","uploadUpdatedReview.php"+data, true);
    xmlhttp.send();  
}

function clickPost(uid){

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

    var fileData = new FormData(document.forms.namedItem("imageFile"));
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function(event) {
        if (xmlhttp.status == 200) {
          var name = xmlhttp.responseText;
          createReview(uid,name);
        } else {
          document.getElementById("output").innerHTML = "Error " + xmlhttp.status + " occurred uploading your file.<br \/>";
        }
    };

    xmlhttp.open("POST", "upload.php", true);
    xmlhttp.send(fileData);

    
}

function createReview(uid, name){

    var xmlhttp;
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
        }
    }
    var title = document.getElementById("r_title").value;

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

    xmlhttp.open("GET","uploadCreatedReview.php"+data, true);
    xmlhttp.send();  

}

function clickLike_R(rid, uid)
{
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    var flag;

    if(document.getElementById("like_r").value == "Like"){
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                document.getElementById("like_r").value = "Unlike";
            }
        }
        flag = 3; 
    }
    else {
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                document.getElementById("like_r").value = "Like";
            }
        }
        flag = 2; 
    }
    var data = "?rid=" + rid + "&uid=" + uid + "&flag=" + flag;
    
    xmlhttp.open("GET","likeClick.php"+data, true);
    xmlhttp.send();
}