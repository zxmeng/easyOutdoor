<?php require('init.php'); ?>

<?php
// Create Topic Object
$event = new Event();

// Create Topic Object
//$user = new User();

// Get template and assign variable
$mainpage = new Page('mainpage.php');

// Assign variables, we can discard these
$mainpage->events = $event->getAllEvents();
$mainpage->totalEvents = $event->getTotalEvents();
//$mainpage->totalCategories =  $topic->getTotalCategories();
//$mainpage->totalUsers =  $user->getTotalUsers();

// Display the mainpage
echo $mainpage;