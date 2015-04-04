<!-- <div class ="modal fade" id = "create" role = "dialog">
    <div class = "modal-dialog">
        <div class = "modal-content"> -->
        
            <div class = "modal-header">
                <h2>Create An Event</h2>
            </div>

            <div class = "modal-body">
               
                <div class="field">
                    <label for='username'>Title</label>
                    <input type="text" name="title" id="c_title" value="">
                </div>

                <div class="field">
                    <label for='password'>Time</label>
                    <input type="datetime-local" name="time" id="c_time" value="">
                </div>

                <div class="field">
                    <label for='password'>District</label>
                    <select name="district" id ="c_district" value="">
                      <option value="shatin">shatin</option>
                      <option value="abc">abc</option>
                      <option value="def">def</option>
                      <option value="ghi">ghi</option>
                    </select>
                </div>

                <div class="field">
                    <label for='password'>Destination</label>
                    <input type="text" name="venue" id="c_venue" value="">
                </div>

                <div class="field">
                    <label for='password'>Max No. of Participants</label>
                    <input type="number" name="limitation" id="c_limitation" value="">
                </div>

                <div class="field">
                    <label for='password'>Description</label>
                    <textarea class="form-control" rows="3" name="description" id="c_description" value=""></textarea>
                </div>

                <div class="field">
                    <label for='username'>Image</label>
                    <input type="file" name="image" id="c_image" accept="image/*" value="">
                    <!-- please modify UI of  this filed, the choose file button -->
                </div>

                <!-- <input type="hidden" name="token" value="<?php //echo Token::generate(); ?>"> -->
                 <div class = "modal-footer">
                    <input type="button" value="Create" onclick="clickSubmit(<?php echo 2; ?>)">
                    <input type="reset" value="Reset">
                </div>
                
            </div>       
       <!--  </div>
    </div>
</div> -->

