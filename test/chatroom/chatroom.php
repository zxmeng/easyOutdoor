<?php
	session_start();

	require_once('DBClass.php');
	require_once('messageClass.php');

    // Create connection
	$db = new DataBase();

	// $roomID = $_GET['roomID'];
	// $userID = $_SESSION['userID'];
	$roomID = 2;
	$userID = 2;

    $getRoomName = "SELECT rname
                    FROM chatroom
                    WHERE rID = $roomID";
    $roomName = $db->query($getRoomName);
    $row = mysqli_fetch_array($roomName);
?>

<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Event's Chatroom</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.poptrox.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/init.js"></script>
	<noscript>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
		<link rel="stylesheet" href="css/masonry-lawrence.css" />
	</noscript>
	<link rel="stylesheet" href="css/chatroom.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->

	<script type="text/javascript">
    //Define the global variable: http_request
    var http_request;

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
            // alert(data);

            http_request.open("post", url, true);
            http_request.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            http_request.onreadystatechange = function(){
            	// alert("here");
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

	setInterval(viewMessage, 500); //send the request twice a second
	function viewMessage(){
		var http_request = createAjaxObject();
		if (http_request){
			var roomID = "<?php echo $roomID; ?>";
			var userID = "<?php echo $userID; ?>";
			var data = "roomID=" + roomID + "&userID=" + userID;
			// alert(data);
			http_request.open("GET", "goToMessageViewer.php?"+data, true);
			http_request.onreadystatechange = function(){
				if(http_request.readyState == 4 && http_request.status == 200){
					document.getElementById("messageViewer").innerHTML = http_request.responseText;				
				}
			}
			http_request.send();
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
	<div class="chatroomheader">
		<h2 align="center">ChatRoom <font color='#58ACFA'> <?php echo $row['rname']; ?> </font></h2>
	</div>
	<div class="chatmain">
			<div id="messageViewer" class="message">
			</div>

			<div class="parti">
			<h2 align="center">Participants:</h2>
			<!--each participant-->
				<div class="chatmessage">
					<div class="chatheader">
						<img src="images/cuhk-test.jpg"><br>
					</div>
					<div class="chatname">
						<p>USERNAME</p>
					</div>
				</div>
			<!--end message-->
			</div>
	</div>
	<style type="text/css">
		.tg  {border-collapse:collapse;border-spacing:0;border-radius: 10px;vertical-align: middle;}
		.tg td{overflow:hidden;vertical-align: middle;}
		.tg th{overflow:hidden;vertical-align: middle;}
	</style>
	<table class="tg" style="width:98%;margin:10px auto 10px auto;">
	 <tr>
	   <th class="tg-031e">
	   <textarea id="sendBox" onkeydown="javascript:buttonOnClick();" 
	   name="comment" rows="5" cols="40" style="width:100%;height:100%;"></textarea>
	   </th>
	   <th class="tg-031e"><input type="submit" id="subbutton" name="submit" 
	   value="Send" style="width:100%;height:100%;" onclick="sendMessage()"> 
	   </th>
	 </tr>
	</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>