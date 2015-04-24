// create the Ajax object according to the browser
function createAjaxObject(){
    if(window.ActiveXObject){
        // for IE6, IE5
        var newRequest = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        // for IE7+, Firefox, Chrome, Opera, Safari
        var newRequest = new XMLHttpRequest();
    }
    return newRequest;
}

// Global variable to incicate whether to show the friend list or not
var show = 0;
// Global variable to indicate the mentioned user's id
// ruid = 0 means not mention anyone
var ruid = 0;

// When the "@" button be clicked, invoke this function to show/hide the friend list
function showFriendList(uid){
    var http_request = createAjaxObject();
    if(http_request){
        var data = "uid=" + uid + "&show=" + show;
        http_request.onreadystatechange = function() {
            if (http_request.readyState == 4 && http_request.status == 200) {
                // Change the innerHTML of the friendList div
                // if show = 0, the responseText will be the html code of friendList
                // if show = 1, the responseText will be empty, that is, hide the friendList
                document.getElementById("friendList").innerHTML = http_request.responseText;

                // change the scroll position
                var main = document.getElementById("friendList");
                var rect = main.getBoundingClientRect();
                window.scrollTo(rect.left, rect.top + window.scrollY);
            }
        }
        http_request.open("GET", "goToFriendList.php?"+data, true);
        http_request.send();
    }
    if (show == 0) show = 1; // Note that the friend list is shown now
    else {
        // if show = 1, then this time the user click to hide the friend list
        // thus reset ruid at the same time
        show = 0;
        ruid = 0;
    }

}

// When the friend name in friend list being clicked, change global variable ruid
function atUser(uid){
    ruid = uid;
}

// Refresh the comment list div when user send a new comment and click the refresh button
function refreshComment(uid, eid){
    var http_request = createAjaxObject();
    if(http_request){
        var data = "uid=" + uid + "&eid=" + eid;
        http_request.onreadystatechange = function() {
            if (http_request.readyState == 4 && http_request.status == 200) {
                document.getElementById("commentList").innerHTML = http_request.responseText;
                // Change the scroll position
                var main = document.getElementById("commentList");
                var rect = main.getBoundingClientRect();
                window.scrollTo(rect.left, rect.top + window.scrollY);
            }
        }
        http_request.open("GET", "goToCommentList.php?"+data, true);
        http_request.send();
    }
}

function sendComment(eid, suid){
    var http_request = createAjaxObject();
    if(http_request){
        // Get the comment content from the comment box
        var content = document.getElementById("commentBox").value;

        // If comment box is empty, show error message and return
        if (content == "") {
            alert ("Please enter the comment content");
            return;
        }

        // If the comment box is not empty, form the data to send
        var data = "suid=" + suid+ "&eid=" + eid + "&content=" + content + "&ruid=" + ruid;

        http_request.open("GET", "sendComment.php?"+data, true);
        http_request.onreadystatechange = function(){
            if(http_request.readyState == 4 && http_request.status == 200){
                var res = http_request.responseText;
                if(res != ""){ // The responseText should be "succeed" from a successful comment sending
                    document.getElementById("commentBox").value = "";  // Clear the commentBox
                    document.getElementById("friendList").innerHTML = ""; // Close the friendList
                    ruid = 0; // reset the global variable
                    refreshComment(suid, eid); // After send comment, refresh the comment list
                }
            }
        }
        http_request.send();
    }
}