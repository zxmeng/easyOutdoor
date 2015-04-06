<!-- <div class ="modal fade" id = "create" role = "dialog">
    <div class = "modal-dialog">
        <div class = "modal-content"> -->
        
            <div class = "modal-header">
                <h2>Create An Event</h2>
            </div>

            <div class = "modal-body">
               
                <div class="field">
                    <label for='username'>Title</label>
                    <input type="text" name="title" id="c_title" value="" required>
                </div>

                <div class="field">
                    <label for='password'>Time</label>
                    <input type="datetime-local" name="time" id="c_time" value="" required>
                </div>

                <div class="field">
                    <label for='password'>District</label>
                    <select name="district" id ="c_district" value="" required>
                      <option value="shatin">shatin</option>
                      <option value="abc">abc</option>
                      <option value="def">def</option>
                      <option value="ghi">ghi</option>
                    </select>
                </div>

                <div class="field">
                    <label for='password'>Destination</label>
                    <input type="text" name="venue" id="c_venue" value="" required>
                </div>

                <div class="field">
                    <label for='password'>Max No. of Participants</label>
                    <input type="number" name="limitation" id="c_limitation" value="" min="2" required>
                </div>

                <div class="field">
                    <label for='password'>Description</label>
                    <textarea class="form-control" rows="3" name="description" id="c_description" value="" required></textarea>
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
                    <input type="button" value="Create" onclick="clickSubmit(<?php echo 2; ?>)">
                    <!-- <input type="button" value="Reset" onclick="resetEmpty()"> -->
                </div>
                
            </div>       
       <!--  </div>
    </div>
</div> -->

<script>

// function resetEmpty(){

//   document.getElementById("c_title").value = "";
//   document.getElementById("c_time").value = "";
//   document.getElementById("c_district").value = "";
//   document.getElementById("c_venue").value = "";
//   document.getElementById("c_limitation").value = "";
//   document.getElementById("c_description").value = "";
//   document.getElementById("c_image").value = "";

// }

</script>