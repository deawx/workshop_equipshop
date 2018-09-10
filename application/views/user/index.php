<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
      <div class="card my-5">
        <h5 class="card-header text-center">Register</h5>
        <div class="card-body">
          <?=form_open();?>
          <div class="form-group">
            <label for="">Firstname:</label>
            <input type="text" name="fullname" class="form-control">
            <small class="form-text text-muted"><?=form_error('firstname');?></small>
          </div>
          <div class="form-group">
            <label for="">Lastname:</label>
            <input type="text" name="fullname" class="form-control">
            <small class="form-text text-muted"><?=form_error('lastname');?></small>
          </div>
          <div class="form-group">
            <label for="">Nickname:</label>
            <input type="text" name="nickname" class="form-control">
            <small class="form-text text-muted"><?=form_error('nickname');?></small>
          </div>
          <div class="form-group">
            <label for="">Birthdate:</label>
            <input type="date" name="birthdate" class="form-control">
            <small class="form-text text-muted"><?=form_error('birthdate');?></small>
          </div>
          <div class="form-group">
            <label for="">Phone:</label>
            <input type="text" name="phone" class="form-control">
            <small class="form-text text-muted"><?=form_error('phone');?></small>
          </div>
          <div class="form-group">
            <label for="">Address:</label>
            <textarea name="address" class="form-control"></textarea>
            <small class="form-text text-muted"><?=form_error('address');?></small>
          </div>
          <hr>
          <div class="form-group">
            <label for="">Email address:</label>
            <input type="email" name="email" class="form-control">
            <small class="form-text text-muted"><?=form_error('email');?></small>
          </div>
          <div class="form-group">
            <label for="">Password:</label>
            <input type="password" name="password" class="form-control">
            <small class="form-text text-muted"><?=form_error('password');?></small>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="<?=site_url('auth/register');?>" class="btn btn-link float-right">Login</a>
          <?=form_close();?>
        </div>
      </div>
    </div>
  </div>
</div>
