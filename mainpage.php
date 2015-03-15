

<!-- front main pages -->
                    <ul id="events">
                    <?php if($events){ ?>
                        <?php foreach($events as $event){ ?>
                        <li class="event">
                            <div class="row">
                                <div class="col-md-2">
                                    <img class="avatar pull-left" src="<?php echo BASE_URL; ?>/<?php echo $event->profilePhoto; ?>" />
                                </div>
                                <div class="col-md-10">
                                    <div class="event-content pull-right">
                                        <!-- <h3><a href="event.php?id=<?php echo $event->ownerID; ?>"><?php echo $event->title; ?></a></h3> -->
                                        <div class="event-info">
                                            <a href="events.php?category=<?php echo urlFormat($event->district); ?>"><?php echo $event->limitation; ?></a> >>
                                            <a href="events.php?user=<?php echo urlFormat($event->ownerID); ?>"><?php echo $event->username; ?></a> >>
                                            Posted on: <?php echo formatDate($event->eventDate); ?>&nbsp;&nbsp;
                                            <!-- <span class="badge pull-right"><?php echo replyCount($event->id); ?></span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </li>
                        <?php } ?>
                    <?php }else{ ?>
                            <p>No Events to Display</p>
                    <?php } ?>

                    </ul>
                    <h2>Forum Statistics</h2>
                        <ul>
                            <!-- <li>Total Number of Users: <strong><?php echo $totalUsers; ?></strong></li> -->
                            <li>Total Number of Events: <strong><?php echo $totalEvents; ?></strong></li>
                            <!-- <li>Total Number of Categories: <strong><?php echo $totalCategories; ?></strong></li> -->
                        </ul>

