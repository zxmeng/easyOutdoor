<?php require('init.php'); ?>
<?php include('header.php'); ?>


<!-- front main pages -->
                    
<!-- title, destination, event date, photo -->
<!-- title, destination, event date, photo, description, creater(name, photo, etc.), participants, likes,-->
<!--  
 数组接收 : $info = unserialize(base64_decode($_GET['info']));

访问的话: echo $info['name']; -->

 <ul id="events">
<?php  
    $events = unserialize(base64_decode($_GET['events']));
    foreach($events as $event){ 
        //$event = $events[$i];
        // echo BASE_URL. $event['profilePhoto'];
?>
    <li>
        <div>
            <a href="eventpage.php?event=<?php echo base64_encode(serialize($event)); ?>">
                <p>Title: <?php echo $event['title']; ?></p>  
            </a>
            <p>Destination: <?php echo $event['destination']; ?></p>                 
            <p>Event Date: <?php echo $event['eventDate']; ?></p> 
            <img src="<?php echo BASE_URL; ?><?php echo $event['profilePhoto']; ?>" />                    
        </div>
    </li>
<?php } ?>

</ul>

<?php include('footer.php') ?>