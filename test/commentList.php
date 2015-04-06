
<?php
	require_once('CommentClass.php');
   	$commentList = new Comment();
	$comments = $commentList->getComments($eid);
	$cNums = mysqli_num_rows($comments);

	if($cNums == 0){ ?>
		<div><h2>No comment now<br></h2></div>
		
		<!--while loop to list all comment-->
<?php } else {
	foreach($comments as $comment){ 
?>
		<div class="commentcontainer">
			<div class="commentheader" type="button" onclick="loadPersonalHomepage(<?php echo $uid.','.$comment['suid']; ?>)">
				<img src="<?php echo $comment['uPhoto']; ?>"><br>
				<?php echo $comment['nickname'] ?>
			</div>
			<div class="commentcontent">
				<?php echo $comment['content']; ?>
			</div>
			<div class="commentinfo">
				<?php echo $comment['time'] ?>
			</div>
			<?php if($comment['ruid'] != 0) { ?>
	   			<div class="commentinfo">
	   				mentioned: <?php echo $commentList->getUserName($comment['ruid']); ?><br/>
	   			</div>
	   		<?php } ?>
		</div>
	<?php }} ?>