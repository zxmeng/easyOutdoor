function calendarSearch(){
    // alert("Here1");
    if(document.getElementById("dateSearch").value == ""){
        alert("Please choose one day to search");
        return;
    }
    var date_iso = document.getElementById("dateSearch").value;
    var date = date_iso.replace('T', ' ');
    // alert(date);
    // alert(typeof date);
    // var start = date + " 00:00:00";
    // alert(start);

    info = "?data=" + date + "&flag=calendar";

    var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
		// alert(xmlhttp.readyState);
		// alert(xmlhttp.status);
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        	// alert("Here2");
        	// alert(xmlhttp.responseText);
            document.getElementById("searchResult").innerHTML= xmlhttp.responseText;
            // alert(xmlhttp.responseText);
        }
    }
	xmlhttp.open("GET","goToSearchResult.php"+info, true);
	// alert(info);
	xmlhttp.send();
}

function mapSearch(district){
    alert("Here!");
    info = "?data=" + district + "&flag=map";

    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("mapResult").innerHTML= xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","goToSearchResult.php"+info, true);
    xmlhttp.send();
}

function smallMap(venue){
    if(venue=='Ma On Shan'){
        document.getElementById("change").innerHTML= "<iframe src=\"http://hkhikingmap.misterngan.com/iframemap.php?routeid=6\" height = \"800\" width = \"600\" frameborder = \"0\"></iframe>";
    }
    else if(venue=='beitan'){
        document.getElementById("change").innerHTML= "<iframe src=\"http://hkhikingmap.misterngan.com/iframemap.php?routeid=9\" height = \"800\" width = \"600\" frameborder = \"0\"></iframe>";
    }
}

function loadDistrictEvents(district){

    // alert("eee");
    info = "?district=" + district + "&flag=event";

    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("searchResults").innerHTML= xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","goToDistrict.php"+info, true);
    xmlhttp.send();

}

function loadDistrictReviews(district){
    alert("HHHH");
    info = "?district=" + district + "&flag=review";

    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("searchResults").innerHTML= xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","goToDistrict.php"+info, true);
    xmlhttp.send();

}