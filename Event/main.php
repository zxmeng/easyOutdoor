<!-- Main -->

			<div id="main">
				<div align="center">
					<img class="header-picture"src="images/logo@20150303.png" >
				</div>
				<div  id = "change">
					<div align="center" style="margin:1em 0 1em 0;">
						<div class="mode-button">
							ALL | CALENDER | MAP | REFERENCE
						</div>
					</div>

					<div class="masonry">				
						<?php
							$event = new Event();
							$events = $event->getAllEvents();

							foreach($events as $event){ 
						?>
					   <!--翔 this is the tox for 1 event, write a while loop to show all the events with this item-->
					   <div class="item">
					   		<div class="item-name"><?php echo $event['title'] ?></div>
					   		<div class="item-picture"><img class="item-picture" src="<?php echo BASE_URL; ?><?php echo $event['profilePhoto']; ?>"></div>
					   		<div class="item-infomation">
					   			<h2>Date:</h2> <?php echo $event['eventDate']; ?><br/>
					   			<!-- <h2>Time:</h2><?php echo $event['lastEditTime']; ?><br/> -->
					   			<h2>Venue:</h2><?php echo $event['destination']; ?><br/>
					   			<h2>Description:</h2><?php echo $event['description']; ?><br/>
					   		</div>
					   		<div align="right">
					   			<div class="button"><button type="button" onclick="loadXMLDoc( <?php echo $event['ID'].', '.$event['ownerID']; ?> )">More Infomation</button></div>
					   		</div>
					   </div>
					   <!--end 1 event--> 
					   <?php } ?>
					</div>
				</div>
			</div>
 
<script>
function loadXMLDoc(eid, uid)
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	window.alert("Here!");
	xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("change").innerHTML= xmlhttp.responseText;
        }
    }
    	var data = "?eid=" + eid + "&uid=" + uid;
	xmlhttp.open("GET","eventDetail.php"+data, true);

	window.alert(data);
	xmlhttp.send();
}

</script>

