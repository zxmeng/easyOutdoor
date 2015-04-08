function calendarSearch(){

    if(document.getElementById("dateSearch").value == ""){
        alert("Please choose one day to search");
        return;
    }

    var date_iso = document.getElementById("dateSearch").value;
    var date = date_iso.replace('T', ' ');
    var info = "?data=" + date + "&flag=calendar";

    var xmlhttp;
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("searchResult").innerHTML= xmlhttp.responseText;
            var mapResult = document.getElementById("mapResult")
            var rect = mapResult.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);
        }
    }

	xmlhttp.open("GET","goToSearchResult.php"+info, true);
	xmlhttp.send();
}

function mapSearch(district){

    var info = "?data=" + district + "&flag=map";
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("mapResult").innerHTML= xmlhttp.responseText;
            // scroll to search results
            var mapResult = document.getElementById("mapResult")
            var rect = mapResult.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);
        }
    }

    xmlhttp.open("GET","goToSearchResult.php"+info, true);
    xmlhttp.send();
}

function smallMap(venue){
    if(venue=='hktrain3'){
        document.getElementById("change").innerHTML= "<div class = mapRoute><iframe src=\"http://hkhikingmap.misterngan.com/iframemap.php?routeid=3&subid=3\" height = \"800\" width = \"800\" frameborder = \"0\"></iframe></div>";
    }
    else if(venue=='hktrain4'){
        document.getElementById("change").innerHTML= "<div class = mapRoute><iframe src=\"http://hkhikingmap.misterngan.com/iframemap.php?routeid=3&subid=4\" height = \"800\" width = \"800\" frameborder = \"0\"></iframe></div>";
    }
    else if(venue=='hktrain7'){
        document.getElementById("change").innerHTML= "<div class = mapRoute><iframe src=\"http://hkhikingmap.misterngan.com/iframemap.php?routeid=3&subid=7\" height = \"800\" width = \"800\" frameborder = \"0\"></iframe></div>";
    }
    else if(venue=='lamma'){
        document.getElementById("change").innerHTML= "<div class = mapRoute><iframe src=\"http://hkhikingmap.misterngan.com/iframemap.php?routeid=50\" height = \"800\" width = \"800\" frameborder = \"0\"></iframe></div>";
    }
    else if(venue=='beitan'){
        document.getElementById("change").innerHTML= "<div class = mapRoute><iframe src=\"http://hkhikingmap.misterngan.com/iframemap.php?routeid=9\" height = \"800\" width = \"800\" frameborder = \"0\"></iframe></div>";
    }
    else if(venue=='Ma On Shan'){
        document.getElementById("change").innerHTML= "<div class = mapRoute><iframe src=\"http://hkhikingmap.misterngan.com/iframemap.php?routeid=6\" height = \"800\" width = \"800\" frameborder = \"0\"></iframe></div>";
    }
    else if(venue=='islands'){
        document.getElementById("change").innerHTML= "<div class = mapRoute><iframe src=\"http://hkhikingmap.misterngan.com/iframemap.php?routeid=18\" height = \"800\" width = \"800\" frameborder = \"0\"></iframe></div>";
    }
    var main = document.getElementById("change")
    var rect = main.getBoundingClientRect();
    window.scrollTo(rect.left, rect.top + window.scrollY);
}

function loadDistrictEvents(district){

    var info = "?district=" + district + "&flag=event";
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("searchResults").innerHTML= xmlhttp.responseText;
            var main = document.getElementById("searchResults")
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);
        }
    }

    xmlhttp.open("GET","goToDistrict.php"+info, true);
    xmlhttp.send();

}

function loadDistrictReviews(district){

    var info = "?district=" + district + "&flag=review";
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("searchResults").innerHTML= xmlhttp.responseText;
            var main = document.getElementById("searchResults")
            var rect = main.getBoundingClientRect();
            window.scrollTo(rect.left, rect.top + window.scrollY);
        }
    }

    xmlhttp.open("GET","goToDistrict.php"+info, true);
    xmlhttp.send();

}