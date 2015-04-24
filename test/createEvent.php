
            <!-- the page to create an event -->

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
                        <option value="Islands">Islands</option>
                        <option value="Kwai Tsing">Kwai Tsing</option>
                        <option value="North ">North</option>
                        <option value="Sai Kung">Sai Kung</option>
                        <option value="Sha Tin">Sha Tin</option>
                        <option value="Tai Po">Tai Po</option>
                        <option value="Tsuen Wan">Tsuen Wan</option>
                        <option value="Tuen Mun">Tuen Mun</option>
                        <option value="Yuen Long">Yuen Long</option>
                        <option value="Sham Shui Po">Sham Shui Po</option>
                        <option value="Kowloon City">Kowloon City</option>
                        <option value="Kwun Tong">Kwun Tong</option>
                        <option value="Wong Tai Sin">Wong Tai Sin</option>
                        <option value="Yau Tsim Mong">Yau Tsim Mong</option>
                        <option value="Central and Western">Central and Western</option>
                        <option value="Eastern">Eastern</option>
                        <option value="Southern">Southern</option>
                        <option value="Wan Chai">Wan Chai</option>
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
                    <!-- user choose an image to be previewed and then uploaded to server -->
                </form>

                 <div class = "modal-footer">
                    <input type="button" value="Create" onclick="clickSubmit(<?php echo $uid; ?>)">
                    <!-- trigger the js function to update database and change the page content-->
                </div>
                
            </div>  