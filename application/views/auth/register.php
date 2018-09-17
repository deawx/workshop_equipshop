<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
      <p class="text-right"> <a href="<?=site_url();?>" class="btn btn-link">Back to Home</a> </p>
      <div class="card mb-5">
        <h5 class="card-header text-center">Register</h5>
        <div class="card-body">
          <?=form_open();?>
          <div class="form-group">
            <label for="">Firstname:</label>
            <input type="text" name="firstname" class="form-control">
            <small class="form-text text-muted"><?=form_error('firstname');?></small>
          </div>
          <div class="form-group">
            <label for="">Lastname:</label>
            <input type="text" name="lastname" class="form-control">
            <small class="form-text text-muted"><?=form_error('lastname');?></small>
          </div>
          <hr>
          <div class="form-group">
            <label for="">Username:</label>
            <input type="text" name="username" class="form-control">
            <small class="form-text text-muted"><?=form_error('username');?></small>
          </div>
          <div class="form-group">
            <label for="">Password:</label>
            <input type="password" name="password" class="form-control">
            <small class="form-text text-muted"><?=form_error('password');?></small>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="<?=site_url('auth/login');?>" class="btn btn-link float-right">Login</a>
          <?=form_close();?>
        </div>
      </div>
    </div>
  </div>
</div>
