<!-- <div class ="modal fade" id = "create" role = "dialog">
    <div class = "modal-dialog">
        <div class = "modal-content"> -->
        <?php
            require_once('UserClass.php');

            $ur = new User();
            $user = $ur->getInfo($pid);

        ?>

            <div class = "modal-header">
                <h2>Edit A Review</h2>
            </div>

            <div class = "modal-body">

                    <div class="field">
                        <label for='username'>Title</label>
                        <input type="text" name="title" id="e_title" value="<?php echo $review['title'];?>">
                    </div>

                    <div class="field">
                        <label for='password'>Time</label>
                        <input type="datetime-local" name="time" id="e_time" value="<?php echo $datetime; ?>">
                    </div>

                    <div class="field">
                        <label for='password'>District</label>
                        <select name="district" id="e_district" value="<?php echo $review['district'];?>">
                          <option value="shatin">shatin</option>
                          <option value="abc">abc</option>
                          <option value="def">def</option>
                          <option value="ghi">ghi</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for='password'>Destination</label>
                        <input type="text" name="venue" id="e_venue" value="<?php echo $review['venue'];?>">
                    </div>

                    <div class="field">
                        <label for='password'>No. of Participants</label>
                        <input type="number" name="parNo" id="e_parNo" value="<?php echo $review['parNo'];?>" min="1">
                    </div>

                    <div class="field">
                        <label for='password'>Description</label>
                        <textarea class="form-control" rows="3" name="description" id="e_description"><?php echo $review['eDescription']; ?></textarea>
                    </div>

                    <form enctype="multipart/form-data" method="post" name="imageFile">
                        <div class="field">
                            <label>Upload Image File</label>
                            <img id="e_img" src="<?php echo $review['ePhoto']; ?>" alt="file not found" style="width: 100px; height: 100px;">
                            <input type="file" name="image" id="e_image" accept="image/*" onchange="previewImage(1)" required />
                        </div>
                    </form>

                    <!-- <input type="hidden" name="token" value="<?php //echo Token::generate(); ?>"> -->
                     <div class = "modal-footer">
                        <div id="output"></div>
                        <!-- <a href="javascript:sendForm()">Stash the file!</a> -->
                        <input type="button" value="Update" onclick="clickUpdate_R(<?php echo $pid.','.$uid; ?>)">
                    </div>
                
            </div>       
       <!--  </div>
    </div>
</div> -->
