<!-- <div class ="modal fade" id = "create" role = "dialog">
    <div class = "modal-dialog">
        <div class = "modal-content"> -->
        
            <div class = "modal-header">
                <h2>Post A Review</h2>
            </div>

            <div class = "modal-body">
               
                <div class="field">
                    <label for='username'>Title</label>
                    <input type="text" name="title" id="r_title" value="" required>
                </div>

                <div class="field">
                    <label for='password'>Time</label>
                    <input type="datetime-local" name="time" id="r_time" value="" required>
                </div>

                <div class="field">
                    <label for='password'>District</label>
                    <select name="district" id ="r_district" value="" required>
                      <option value="shatin">shatin</option>
                      <option value="abc">abc</option>
                      <option value="def">def</option>
                      <option value="ghi">ghi</option>
                    </select>
                </div>

                <div class="field">
                    <label for='password'>Destination</label>
                    <input type="text" name="venue" id="r_venue" value="" required>
                </div>

                <div class="field">
                    <label for='password'>No. of Participants</label>
                    <input type="number" name="limitation" id="r_parNo" value="" required>
                </div>

                <div class="field">
                    <label for='password'>Description</label>
                    <textarea class="form-control" rows="3" name="description" id="r_description" value="" required></textarea>
                </div>

                <form enctype="multipart/form-data" method="post" name="imageFile">
                    <div class="field">
                        <label>Upload Image File</label>
                         <img id="c_img" src="images/cuhk.jpg" style="width: 100px; height: 100px;">
                        <input type="file" name="image" id="c_image" accept="image/*"  onchange="previewImage(0)" required />
                    </div>
                </form>

                <!-- <input type="hidden" name="token" value="<?php //echo Token::generate(); ?>"> -->
                 <div class = "modal-footer">
                    <input type="button" value="Post" onclick="clickPost(<?php echo 2; ?>)">
                    <!-- <input type="button" value="Reset" onclick="resetEmpty()"> -->
                </div>
                
            </div>       
       <!--  </div>
    </div>
</div> -->
