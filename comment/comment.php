<?php
	session_start();

	require_once('DBClass.php');

    // Create connection
	$db = new DataBase();

	// $eventID = $_POST['eventID'];
	// $senderID = $_POST['userID'];
	$eventID = 1;
	$senderID = 3;
?>

<html>
<head>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	// Define the global variable: receiverID
	var receiverID = -1;

	function atSomeone(){
		if ((event.shiftKey) && (event.keyCode == 50)) { 
			showFriendList();
			return false; 
		}
	}

	function showFriendList(str){
		var xmlhttp;    
		if (str==""){
		  document.getElementById("txtHint").innerHTML="";
		  return;
		}
		if (window.XMLHttpRequest){ // code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		}
		else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		    	document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","/ajax/getcustomer.asp?q="+str,true);
		xmlhttp.send();
	}

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

	function sendComment(){
		var http_request = createAjaxObject();
        if(http_request){
            var url = "sendComment.php";
            var senderID = "<?php echo $senderID; ?>";
            var eventID = "<?php echo $eventID; ?>";
            var content = document.getElementById("commentBox").value;
            if (content == "") {
            	alert ("Please enter the comment content");
            	return;
            }

            var data = "senderID=" + senderID + "&eventID=" + eventID + "&content=" + content + "&receiverID=" + receiverID;
            // alert(data);

            http_request.open("post", url, true);
            http_request.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            http_request.onreadystatechange = function(){
				if(http_request.readyState == 4 && http_request.status == 200){
					var res = http_request.responseText;
					if(res != ""){
						document.getElementById("commentBox").value = "";  //Clear the commentBox
					}
				}
			}
            http_request.send(data);
        }
        // after send a comment, reset the global variable
        receiverID = -1;
	}

</script>
</head>

<body>
<div id="comment">
	<textarea style="resize:none;width:460px;height:400px" readonly="readonly" id="messageBox"></textarea>
	<hr />
	<textarea name="content" id="commentBox" onkeydown="javascript: atSomeone();" style="resize:none;width:460px; height:100px"></textarea>
	<p><input id="subbutton" style="width:60px; background:rgb(130, 224, 255); border:none; padding:10px;" 
	type="button" name="submit" onclick="sendComment()" value="send" /></p>
</div>
</body>
</html>