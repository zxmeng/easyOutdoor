<?php require('init.php'); ?>

<?php
// Create Topic Object
echo "<p>I am index.php</p>";

// $var1 = "lala";
// $var2 = 1;
// $var3 = 123;
// $var4 = "2015/3/18";
// $var5 = 20;
// $var6 = "abc.jpg";
// $event1 = new Event($var1,$var2,$var3,$var4,$var5,$var6);

// $var1 = "yoyo";
// $var2 = 2;
// $var3 = 133;
// $var4 = "2015/5/18";
// $var5 = 30;
// $var6 = "cde.jpg";
// $event2 = new Event($var1,$var2,$var3,$var4,$var5,$var6);
// Create Topic Object
// $user = new User();

// $events = array($event1, $event2);
// Get template and assign variable
// $mainpage = new Page('mainpage.php');

$et = new Event();
//$et->getTotalEvents();
// $events = $et->getAllEvents();

// Get template and assign variable
// $frontpage = new Page('frontpage.php');

// Assign variables
$ets = $et->getAllEvents();

// 数组传递这么写:   echo"<ahref=2.php?info=".base64_encode(serialize($information)).">info</a>" ;
?>
<!DOCTYPE html>
<html>
<body>
<?php echo "<a href=\"mainpage.php?events=".base64_encode(serialize($ets))."\">链接</a>";?>
</body>
</html>
