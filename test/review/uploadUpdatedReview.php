
<?php
    require_once('Page.php');
    require_once('ReviewClass.php');

    $review = new Review();
    $uid = $_GET['uid'];

    $pid = $_GET['pid'];
    $title = $_GET["title"];
    $venue = $_GET["venue"];
    $district = $_GET["district"];
    $time = $_GET["time"];
    $description = $_GET["description"];
    $image = $_GET["image"];
    $parNo = $_GET["parNo"];
	
	$review->editReview($pid, $title, $venue, $district, $time, $description, $image, $parNo);

    $review->db->close();
    
    $page = new Page('reviewPage.php');
    $page->uid = $uid;
    $page->pid = $pid;
    //echo $uid;
    echo $page;
?>