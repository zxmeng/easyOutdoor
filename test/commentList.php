
<?php
	require_once('CommentClass.php');
   	$commentList = new Comment();
	$comments = $commentList->getComments($eid);
	$cNums = mysqli_num_rows($comments);
?>

<!-- Used to fill/refresh the commentList div -->
<div id="commentList">
	<?php
	$cNums = mysqli_num_rows($comments); // Get the number of comments

	if($cNums == 0){
	?>
	<!-- If there is no comment now, show a prompt message -->
		<div><h2>No comment now</br></h2></div>
	<?php
	} else {
		// else, there are some comments, foreach loop to list all comment
		foreach($comments as $comment){ 
	?>
		<!-- every commentcontainer contains a comment -->
		<div class="commentcontainer">
			<!-- comment header contains user photo and nickname -->
			<div class="commentheader" type="button" onclick="loadPersonalHomepage(<?php echo $uid.','.$comment['suid']; ?>)">
				<img src="<?php echo $comment['uPhoto']; ?>"><br>
				<h5><?php echo $comment['nickname'] ?><h5>
			</div>
			<div class="commentcontent">
				<h3 style="line-height: 40px;"><?php echo $comment['content']; ?></H3>
			</div>
			<!-- comment time and mention information -->
			<div class="commentinfo" style="margin-left:70px;">
				<h6>
				<?php echo $comment['time'] ?>   <?php if($comment['ruid'] != 0) { ?>mentioned: <?php echo $commentList->getUserName($comment['ruid']); } ?>
	   			<br></h6>
	   		</div>
		</div>
	<?php }} ?>
	<!--end loop and else-->
</div>