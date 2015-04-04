
<?php
    require_once('Page.php');
    require_once('EventClass.php');

    $event = new Event();

    $uid = $_GET['uid'];
    $title = $_GET["title"];
    $venue = $_GET["venue"];   
    $district = $_GET["district"];
    $time = $_GET["time"];
    $description = $_GET["description"];
    $image = $_GET["image"];
    $limit = $_GET["limit"];
    
	//echo $uid.$title.$time.$district.$venue.$limit.$description.$image;
	$eid = $event->createEvent($uid, $title, $venue, $district, $time, $description, $image, $limit);

	$event->db->close();
	
    $page = new Page('eventPage.php');
    $page->uid = $uid;
    $page->eid = $eid;

    echo $page;
?>