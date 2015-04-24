<?php 
require_once('ReviewClass.php'); 
?>


<?php 
   $review = new Review();
   $rInfo = $review->getReview($pid); 

?>

<!-- show the details of a review -->
<div class="bannercontainer">
	<img src="images/background.png">
</div>

<div class="eventinfo" style="margin:10px 0 0 0;">

	<div class="eventdetail" style="display:inline">
		<h2><?php echo $rInfo['title']; ?></h2>
		<h4><?php echo $rInfo['eDate']; ?>  <?php echo $rInfo['venue']; ?></h4>
		<br><br>
		<div style="overflow:hidden;">
		<h4><?php echo $rInfo['eDescription']; ?></h4>
		</div>
	</div>
	
	<?php
		$map_url = $rInfo['venue'];
		$map_url = str_replace(" ", "+", $map_url);
	?>
	<div class="eventmap">
		<iframe width="350" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="http://maps.google.nl/maps?q=<?=$map_url?>&hl=nl&ie=UTF8&t=v&hnear=<?=$map_url?>&z=13&amp;output=embed"></iframe>
	</div>

</div>	
	<!--button-->
	<div style="margin:1em 0 1em 0;bottom:0px;">
			<div class="mode-button">
				<div class="btn-group" role="group" aria-label="...">
			<?php if($uid == $rInfo['uid']) {?>
					<button class="btn btn-default" id="edit" type="submit" name="submit" value="Edit" onclick="clickEdit_R(<?php echo $pid.','.$uid; ?>)">Edit</button>
			<?php 
				} else{
			?>
					<button class="btn btn-default" id="like_r" type="submit" name="submit" 
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
						if($review->checkLike($pid, $uid) < 1){
							echo "Like";
						}
						else {
							echo "Unlike";
						}
					?>
					</button>
			<?php 				
				} 
			?>
				</div>
			</div>
		</div>
	</div>
<br>

