<!-- <div class ="modal fade" id = "create" role = "dialog">
    <div class = "modal-dialog">
        <div class = "modal-content"> -->
        <?php
            require_once('UserClass.php');

            $ur = new User();
            $user = $ur->getInfo($uid);

        ?>

            <div class = "modal-header" style="margin-left:10%;">
                <h2>Edit Your Profile</h2>
            </div>

            <div class = "modal-body edit">

                    <div class="field">
                        <label for='username'>Nickname</label>
                        <input type="text" name="nickname" id="nickname" value="<?php echo $user['nickname'];?>">
                    </div>

                    <div class="field">
                        <label for='password'>Phone</label>
                        <input type="text" name="phone" id="phone" value="<?php echo $user['phone']; ?>">
                    </div>

                    <div class="field">
                        <label for='password'>Description</label>
                        <textarea class="form-control" rows="3" name="description" id="description"><?php echo $user['uProfile']; ?></textarea>
                    </div>

                    <form enctype="multipart/form-data" method="post" name="imageFile">
                        <div class="field">
                            <label>Upload Image File</label>
                            <img id="e_img" src="<?php echo $user['uPhoto']; ?>" alt="file not found" style="width: 100px; height: 100px;">
                            <input type="file" name="image" id="e_image" accept="image/*" onchange="previewImage(1)" required />
                        </div>
                    </form>

                    <!-- <input type="hidden" name="token" value="<?php //echo Token::generate(); ?>"> -->
                     <div class = "modal-footer">
                        <div id="output"></div>
                        <!-- <a href="javascript:sendForm()">Stash the file!</a> -->
                        <input type="button" value="Update" onclick="clickUpdateProfile(<?php echo $uid; ?>)">
                    </div>
                
            </div>       
       <!--  </div>
    </div>
</div> -->
