<?php
	session_start();
	//include "include/dbconn.php";
    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname) or die("unable to connect to database");

    include "common.inc.php";

	$receiver= $_GET['receiver'];
	$nickname = $_SESSION['nickname'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="main.css" type="text/css" rel="stylesheet" />
<title>ChatRoom</title>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">

	//Define the global variable: http_request
	var http_request;

	//**********************Send messages******************
	$(function(){
		$("#sendmess").click(sendMessage);
	});

	function sendMessage(){
		var http_request = createAjaxObject();
		if(http_request){
			var url = "sendMessage.php";
			var sender = "<?php echo $nickname; ?>";
			var receiver = "<?php echo $receiver; ?>";
			var content = $("#sendBox").val();
			var data = "content="+content+"&sender="+sender+"&receiver="+receiver;
			//alert(data);
			http_request.open("post", url, true);
			http_request.setRequestHeader("content-type", "application/x-www-form-urlencoded");
			http_request.onreadystatechange = function(){
				if(http_request.readyState==4){
					if(http_request.status==200){
						var res = http_request.responseText;
						if(res != ""){
							//sending success, write the message into 'messageBox'
							//var nowtime = new Date().toLocaleString();
							var content1 = "<?php echo $nickname.' '; ?>"+res+"\r\n";
							var content2 = content+"\r\n" ;
							var contents = $("#messageBox").val()+content1+content2;
							//alert(content);
							$("#messageBox").val(contents);
							$("#sendBox").val("");  //Clear the sendBox
						}
					}
				}
			}
			http_request.send(data);
		}
	}

	//**********************Reveive messages********************
	setInterval(getMessage,1000); //send the request once a second
	function getMessage(){
		var http_request = createAjaxObject();
		if(http_request){
			var url = "receiveMessage.php";
			var sender = "<?php echo $nickname; ?>";
			var receiver = "<?php echo $receiver; ?>";
			var data = "sender="+sender+"&receiver="+receiver;
			//alert(data);
			http_request.open("post",url,true);
			http_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
			http_request.onreadystatechange = function(){
				if(http_request.readyState==4){
					if(http_request.status==200){
						if(http_request.responseText=="nomessage"){
							return;
							}
						var res = eval("("+http_request.responseText+")");
						for(var i=0;i<res.length;i++){
							var content1 = "<?php echo $receiver; ?> "+res[i].stime+"\r\n";
							var content2 = res[i].content+"\r\n" ;
							var contents = $("#messageBox").val()+content1+content2;
							//alert(content);
							$("#messageBox").val(contents);
						}
					}
				}
			}
			http_request.send(data);
		}
	}

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
</script>
</head>

<body>
<div id="message">
	<hr />
	<p>Chatting with<font color='red'> <?php echo $receiver; ?> </font></p>
	<hr />
	<textarea readonly="readonly" id="messageBox"></textarea>
</div>
<div id="message2">
	<textarea name="content" id="sendBox"></textarea>
	<p><input type="button" value="send" id="sendmess" /></p>
</div>
</body>
</html>
