<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card my-5">
        <h5 class="card-header text-center">Log In Admin</h5>
        <div class="card-body">
          <?=form_open();?>
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
          <?=form_close();?>
        </div>
      </div>
      <a href="<?=site_url();?>" class="btn btn-link float-right">Back to Home</a>
    </div>
  </div>
</div>
