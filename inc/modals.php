<div id="loginModal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">				
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">				
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Password</label>                            
                        <input type="password" name="password" id="password" class="form-control" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo ROOT_URL; ?>/create_account.php" class="link-primary">Create Account</a>
                    <button type="button" name="login_button" id="login_button" class="btn btn-warning">Login</button>
                </div>
            </div>
        </div>
</div>