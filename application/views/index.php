<div class="container-fluid my-5">
  <div class="row">
    <div class="col-sm-8">

    </div>
    <div class="col-sm-4">
      <?php if (isset($session['is_login'])) { ?>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Fullname</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">View Profile</a>
          </div>
        </div>
        <?php if (isset($session['is_login'])) { ?>
          <div class="card">
            <div class="card-body">
              <a href="#" class="btn btn-primary">Go to Admin Page</a>
            </div>
          </div>
        <?php } ?>
      <?php } else { ?>
        <div class="card">
          <div class="card-header"> Login </div>
          <div class="card-body">
            <?=form_open('auth/login');?>
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <!-- <div class="form-group form-check">
              <label class="form-check-label">
                <input name="remember_me" class="form-check-input" type="checkbox"> Remember me
              </label>
            </div> -->
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?=site_url('auth/register');?>" class="btn btn-link float-right">Register</a>
            <?=form_close();?>
          </div>
        </div>
        <hr>
        <div class="card">
          <div class="card-header"> Login Admin </div>
          <div class="card-body">
            <a href="<?=site_url('auth/login_admin');?>" class="btn btn-link float-right">Administrator</a>
          </div>
        </div>
        <br>
        <div class="card">
          <div class="card-header"> Tracking </div>
          <div class="card-body">
            <?=form_open();?>
            <div class="form-group">
              <label for="email">Order number:</label>
              <input type="email" name="track" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <?=form_close();?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
