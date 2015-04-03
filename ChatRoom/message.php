<?php
	session_start();

	require_once('DBClass.php');

    // Create connection
	// $link = mysql_connect(DB_HOST, DB_USER, DB_PSW) or die ('unable to connect: ' . mysql_error());
	// mysql_select_db(DB_NAME);
	$db = new DataBase();

	// $roomID = $_GET['roomID'];
	// $userID = $_SESSION['userID'];
	$roomID = 2;
	$userID = 4;

    $getRoomName = "SELECT name
                    FROM chatroom
                    WHERE roomID = $roomID";
    // $roomName = mysql_query($getRoomName, $link) or die ('unable to find the chatroom: ' . mysql_error());
    $roomName = $db->query($getRoomName);
    $row = mysqli_fetch_array($roomName);

?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="main.css" type="text/css" rel="stylesheet" />
<title>ChatRoom</title>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/pnotify.custom.min.js"></script>

<script type="text/javascript">

    //Define the global variable: http_request
    var http_request;
    var position = 0;
    // alert((position ==null) ? "null":(typeof position));
    var diff;

    //create the Ajax object
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

	function sendMessage(){
        var http_request = createAjaxObject();
        if(http_request){
            var url = "sendMessage.php";
            var userID = "<?php echo $userID; ?>";
            var roomID = "<?php echo $roomID; ?>";
            // alert(userID);
            // alert(roomID);
            var content = document.getElementById("sendBox").value;
            if (content == "") {
            	alert ("Please enter the message content");
            	return;
            }
            // alert(content);
            var data = "userID=" + userID + "&roomID=" + roomID + "&content=" + content;
            alert(data);

            http_request.open("post", url, true);
            http_request.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            http_request.onreadystatechange = function(){
				if(http_request.readyState == 4 && http_request.status == 200){
					var res = http_request.responseText;
					if(res != ""){
						//sending success, write the message into 'messageBox'
						document.getElementById("sendBox").value = "";  //Clear the sendBox
					}
				}
			}
            http_request.send(data);
        }
	}

	setInterval(viewNewMessage, 500); //send the request twice a second
	function viewNewMessage(){
		var http_request = createAjaxObject();
		if (http_request){
			var url = "viewMessage.php";
			var roomID = "<?php echo $roomID; ?>";
			var data = "roomID=" + roomID;
			// alert(data);
			http_request.open("post", url, true);
			http_request.setRequestHeader("content-type", "application/x-www-form-urlencoded");
			http_request.onreadystatechange = function(){
				if(http_request.readyState == 4 && http_request.status == 200){
					// alert("state check success");
					// if there is no message in the database, just end this call
					if(http_request.responseText == "no message") return;
					// else, convert the string in json into object
					var res = eval("(" + http_request.responseText + ")");
					// get the user name from the userName, and show messages in messageBox

					if (eval(res[0].MID) > position){
					// alert((position ==null) ? "null":(typeof position));

					for(var i=res.length-1; i>=0; i--){
						// alert(res.length);
						diff = eval(eval(res[i].MID) - position);
						// alert(diff);
						if (diff <= 0) continue;

						var userName = res[i].userName + " ";
						var time = res[i].time + "\r\n";
						var content = res[i].content + "\r\n" ;
						var contents = userName + time + content;
						document.getElementById("messageBox").value += contents;
						// If the new message is not belong to current user, then send a desk notification
						if (res[i].userID != <?php echo $userID ?>) {
							PNotify.desktop.permission(); 
							(new PNotify({
								title: 'New Message From Chat Room [<?php echo $row['name']; ?>]',
								text: contents,
								desktop: {
									desktop: true
								}
							})).get().click(function(e){
								if ($('.ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *').is(e.target))
									return;
								// self.focus();
							});
						}
					}
					position = eval(res[0].MID);
					// alert(position);
					}
				}
			}
			http_request.send(data);
		}
	}

	// when just load the html
	function viewMessage(){
		var http_request = createAjaxObject();
		if (http_request){
			var url = "viewMessage.php";
			var roomID = "<?php echo $roomID; ?>";
			var data = "roomID=" + roomID;
			// alert(data);
			http_request.open("post", url, true);
			http_request.setRequestHeader("content-type", "application/x-www-form-urlencoded");
			http_request.onreadystatechange = function(){
				if(http_request.readyState == 4 && http_request.status == 200){
					// alert("state check success");
					// if there is no message in the database, just end this call
					if(http_request.responseText == "no message") return;
					// else, convert the string in json into object
					// if the messages cannot be shown, then there must be something wrong 
					// in the content of messages
					var res = eval("(" + http_request.responseText + ")");

					// get the user name from the userName, and show messages in messageBox
					for(var i=res.length-1; i>=0; i--){
						// alert(res.length);
						var userName = res[i].userName + " ";
						var time = res[i].time + "\r\n";
						var content = res[i].content + "\r\n" ;
						var contents = userName + time + content;
						// alert(contents);
						if (i == res.length-1){
							document.getElementById("messageBox").value = contents;
						}
						else {
							document.getElementById("messageBox").value = document.getElementById("messageBox").value + contents;
						} 
					}
					position = eval(res[0].MID);
					// alert((res[0].MID ==null) ? "null":(typeof res[0].MID));
					// alert(res[0].MID);
					// alert((position ==null) ? "null":(typeof position));
					// alert(position);
				}
			}
			http_request.send(data);
		}
	}

	function buttonOnClick() { 
		if (event.keyCode == 13) { 
			document.getElementById("subbutton").click(); 
			return false; 
		}
	}

</script>
</head>

<body onload="viewMessage()">
<div id="message">
	<hr />
	<p>ChatRoom: <font color='red'> <?php echo $row['name']; ?> </font></p>
	<hr />
	<textarea style="resize:none;width:460px;height:400px" readonly="readonly" id="messageBox"></textarea>
</div>
<form id="message2">
	<textarea name="content" id="sendBox" onkeydown="javascript:buttonOnClick();" style="resize:none;width:460px; height:50px"></textarea>
	<p>
		<input id="subbutton" style="width:60px; background:rgb(130, 224, 255); 
		border:none; padding:10px;" type="button" name="submit" 
		value="send" onclick="sendMessage()" />
	</p>
</form>
</body>
</html>