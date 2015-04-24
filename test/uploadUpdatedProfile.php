
<?php
    require_once('Page.php');
    require_once('UserClass.php');

    // update database and return the page to display the updated profile
    $user = new User();
    $uid = $_GET['uid'];


    $nickname = $_GET["nickname"];
    $phone = $_GET["phone"];
    $description = $_GET["description"];
    $image = $_GET["image"];

	$user->editProfile($uid, $nickname, $phone, $description, $image);

    $user->db->close();
    
    $page = new Page('friendPage.php');
    $page->uid = $uid;

    echo $page;
?>