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

var show = 0;

function showFriendList(uid){
    // alert(show);
    var http_request = createAjaxObject();
    if(http_request){
        var data = "uid=" + uid + "&show=" + show;
        http_request.onreadystatechange = function() {
            if (http_request.readyState == 4 && http_request.status == 200) {
                // alert(http_request.responseText);
                document.getElementById("friendList").innerHTML = http_request.responseText;
            }
        }
        http_request.open("GET", "goToFriendList.php?"+data, true);
        http_request.send();
    }
    if (show == 0) show = 1;
    else {
        // if show = 1, then this time the user click to hide the friend list
        // thus reset ruid at the same time
        show = 0;
        ruid = 0;
    }

}

function atUser(uid){
    ruid = uid;
    // alert("ruid = "+ruid);
}

function refreshComment(eid){
    // alert("function");
    var http_request = createAjaxObject();
    if(http_request){
        var data = "eid=" + eid;
        // alert(data);
        http_request.onreadystatechange = function() {
            if (http_request.readyState == 4 && http_request.status == 200) {
                // alert(http_request.responseText);
                document.getElementById("commentList").innerHTML = http_request.responseText;
            }
        }
        http_request.open("GET", "goToCommentList.php?"+data, true);
        http_request.send();
    }
}

