<div class="friendmain">
			<div class="friendlist">
				<h2 style="padding:5px;">Friends</h2>
				<hr style="margin:3px 0 3px 0;">
			<!--each participant-->
				<div class="chatmessage">
					<div class="chatheader">
						<img src="images/cuhk-test.jpg"><br>
					</div>
					<div class="chatcontent">
						<p>USERNAME</p>
					</div>
				</div>
			<!--end message-->
</div>

			<div class="frienddetail" >
				<div align="center">
				<img class="icon" src="images/logo.png">
				<div class="name"><a href="profile.php?user=<?php echo escape($user->data()->username);?>"><?php echo escape($user->data()->username); ?>
				</div>
				<div style="margin:10px 0 10px 0">
				        <a href="">Follow</a>
				</div>
			        <div class="mode-button">
						<button>PAST</button>|<button>NOW</button><br>
					</div>
				</div>
					 <!--翔 this is the tox for 1 event, write a while loop to show all the events with this item-->
				   <div class="item">
				   		<div class="item-name">1香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港沙田的公立研究型大學。大學於1963年創校，並於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button" onclick="location.href='single-event.php'">More Infomation</div></div>
				   </div>
				   <!--end 1 event-->
			</div>
<!--end button-->

	
</div>