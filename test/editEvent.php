<!-- <div class ="modal fade" id = "create" role = "dialog">
    <div class = "modal-dialog">
        <div class = "modal-content"> -->
        <?php
            require_once('EventClass.php');

            $et = new Event();
            $event = $et->getEvent($eid);
            $origin = strtotime($event['eDate']);
            $date = date("Y-m-d", $origin);
            $time = date("h:m:s", $origin);
            $datetime = $date.'T'.$time;
            // $dt = new DateTime($origin);
            // $datetime = $dt->format(DateTime::ISO8601);

            //$time = $origin->format('YYYY-MM-DDThh:mm:ss.ms');
            $et->db->close();
        ?>


            <div class = "modal-header">
                <h2>Edit An Event</h2>
            </div>

            <div class = "modal-body">
               
                    <div class="field">
                        <label for='username'>Title</label>
                        <input type="text" name="title" id="e_title" value="<?php echo $event['title'];?>">
                    </div>

                    <div class="field">
                        <label for='password'>Time</label>
                        <input type="datetime-local" name="time" id="e_time" value="<?php echo $datetime; ?>">
                    </div>

                    <div class="field">
                        <label for='password'>District</label>
                        <select name="district" id="e_district" value="<?php echo $event['district'];?>">
                          <option value="shatin">shatin</option>
                          <option value="abc">abc</option>
                          <option value="def">def</option>
                          <option value="ghi">ghi</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for='password'>Destination</label>
                        <input type="text" name="venue" id="e_venue" value="<?php echo $event['venue'];?>">
                    </div>

                    <div class="field">
                        <label for='password'>Max No. of Participants</label>
                        <input type="number" name="limitation" id="e_limitation" value="<?php echo $event['limitation'];?>">
                    </div>

                    <div class="field">
                        <label for='password'>Description</label>
                        <textarea class="form-control" rows="3" name="description" id="e_description"><?php echo $event['eDescription'];?></textarea>
                    </div>

                    <div class="field">
                        <label for='username'>Image</label>
                        <input type="file" name="image" id="e_image" accept="image/*" value="">
                        
                    </div>


<!--     <form method="post" enctype="multipart/form-data"  action="upload.php">
      <input type="file" name="images[]" id="images" />
      <button type="submit" id="btn">Upload Files!</button>
    </form>
<script src="upload.js"></script> -->

                    <!-- <input type="hidden" name="token" value="<?php //echo Token::generate(); ?>"> -->
                     <div class = "modal-footer">
                        <input type="submit" value="Update" onclick="clickUpdate(<?php echo $eid.','.$uid; ?>)">
                        <input type="reset" value="Reset">
                    </div>
                
            </div>       
       <!--  </div>
    </div>
</div> -->
