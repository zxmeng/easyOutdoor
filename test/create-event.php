<div class ="modal fade" id = "create" role = "dialog">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <h2>Create An Event</h3>
            </div>
            <div class = "modal-body">
               <form action="" method="post">
                <!--please change the name and id when you use these fields-->
                    <div class="field">
                        <label for='username'>Title</label>
                        <input type="text" name="username" id="username">
                    </div>

                    <div class="field">
                        <label for='password'>Date</label>
                       <input type="text" name="username" id="username">
                    </div>

                    <div class="field">
                        <label for='password'>Time</label>
                        <input type="text" name="username" id="username">
                    </div>

                    <div class="field">
                        <label for='password'>Destination</label>
                        <input type="text" name="username" id="username">
                    </div>

                    <div class="field">
                        <label for='password'>Description</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>

                    <div class="field">
                        <label for='username'>Image</label>
                        <input type="text" name="username" id="username">
                    </div>
                

                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    

                </form>
            </div>
            <div class = "modal-footer">
                <input type="submit" value="Create">
            </div>
        </div>
    </div>
</div>