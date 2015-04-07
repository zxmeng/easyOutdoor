<?php 
require_once('ReviewClass.php'); 
?>


<?php 
   $review = new Review();
   $rInfo = $review->getReview($pid); 

?>

<div class="bannercontainer">
	<img src="images/background.png">
</div>

<div class="eventinfo">
	<div class="eventdetail" style="display:inline">
		<h2>Title: <?php echo $rInfo['title']; ?></h2>
		<h4>Date: <?php echo $rInfo['eDate']; ?></h4>
		<h4>Venue: <?php echo $rInfo['venue']; ?></h4>
		<h4>Description: <?php echo $rInfo['eDescription']; ?></h4>
	</div>
	
	<?php
		$map_url = $rInfo['venue'];
		$map_url = str_replace(" ", "+", $map_url);
	?>
	<div class="eventmap">
	<iframe width="350" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="http://maps.google.nl/maps?q=<?=$map_url?>&hl=nl&ie=UTF8&t=v&hnear=<?=$map_url?>&z=13&amp;output=embed"></iframe>
	</div>
	<!--button-->
	<div class="eventbuttons" style="padding:right">

	<?php if($uid == $rInfo['uid']) {?>
			<input id="edit" type="submit" name="submit" value="Edit" onclick="clickEdit_R(<?php echo $pid.','.$uid; ?>)"> 
	<?php 
		} else{
	?>
			<input id="like_r" type="submit" name="submit" 
			value="<?php 
						if($review->checkLike($pid, $uid) < 1){
							echo "Like";
						}
						else {
							echo "Unlike";
						}
					?>" 
			onclick="clickLike_R(<?php echo $pid.', '.$uid; ?>)">
	<?php 				
		} 
	?>
		</div>
</div><br>

