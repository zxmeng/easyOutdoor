<?php require('init.php'); ?>
<?php include('header.php'); ?>


<!-- front main pages -->
                    
<!-- title, destination, event date, photo -->
<!-- title, destination, event date, photo, description, creater(name, photo, etc.), participants, likes,-->
<!--  
 数组接收 : $info = unserialize(base64_decode($_GET['info']));

访问的话: echo $info['name']; -->


<?php $event = unserialize(base64_decode($_GET['event'])); ?>

<div>
    <a href="eventpage.php?event=<?php echo base64_encode(serialize($event)); ?>">
        <p>Title: <?php echo $event['title']; ?></p>  
    </a>
    <p>Destination: <?php echo $event['destination']; ?></p>                 
    <p>Event Date: <?php echo $event['eventDate']; ?></p> 
    <img src="<?php echo BASE_URL; ?><?php echo $event['profilePhoto']; ?>" />
    <p>Description: <?php echo $event['description']; ?> </p>
    <p>Creater: <?php echo $event['username']; ?> </p>
    <p># of Like: <?php echo $event['likeNum']; ?> </p>
    <p>Pariticipates: ......(should be the profile photos)</p>                  
</div>

<?php include('footer.php') ?>