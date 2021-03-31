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
                    <a href="" class="link-primary" data-target="#CA_Modal" data-toggle="modal">Create Account</a>
                    <button type="button" name="login_button" id="login_button" class="btn btn-warning">Login</button>
                </div>
            </div>
        </div>
</div>

<div id="CA_Modal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">				
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" name="CA_u_name" id="CA_u_name" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Admin or User</label>
                        <select name="CA_u_type" id="CA_u_type">
                        <option value="admin">Admin</option>
                        <option value="customer">Customer</option>
                        </select>
                    </div>				
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="CA_email" id="CA_email" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Password</label>                            
                        <input type="password" name="CA_password" id="CA_password" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>                            
                        <input type="number" step= 1 name="CA_phone_no" id="CA_phone_no" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="CA_address" id="CA_address" class="form-control"></textarea> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" name="CA_button" id="CA_button" class="btn btn-warning">Create Account</button>
                </div>
            </div>
        </div>
</div>