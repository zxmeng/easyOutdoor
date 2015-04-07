
<?php
	require_once('CommentClass.php');
   	$commentList = new Comment();
	$comments = $commentList->getComments($eid);
	$cNums = mysqli_num_rows($comments);
?>
<div id="commentList">
	<!--while loop to list all comment-->
	<?php
		$cNums = mysqli_num_rows($comments);
		if($cNums == 0){ ?>
			<div><h2>No comment now</br></h2></div>
	<?php } else {
		foreach($comments as $comment){ 
	?>
			<div class="commentcontainer">
				<div class="commentheader" type="button" onclick="loadPersonalHomepage(<?php echo $uid.','.$comment['suid']; ?>)">
					<img src="<?php echo $comment['uPhoto']; ?>"><br>
					<h5><?php echo $comment['nickname'] ?><h5>
				</div>
				<div class="commentcontent">
					<h3 style="line-height: 40px;"><?php echo $comment['content']; ?></H3>
				</div>
				<div class="commentinfo" style="margin-left:70px;">
					<h6>
					<?php echo $comment['time'] ?>   <?php if($comment['ruid'] != 0) { ?>mentioned: <?php echo $commentList->getUserName($comment['ruid']); } ?>
		   			<br></h6>
		   		</div>
			</div>
		<?php }} ?>
	<!--endwhile-->
</div>