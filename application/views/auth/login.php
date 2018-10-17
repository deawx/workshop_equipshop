<div class="container py-5">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card my-5">
        <h5 class="card-header text-center">เข้าสู่ระบบ</h5>
        <div class="card-body">
          <form class="needs-validation" action="" method="post" novalidate>
            <div class="form-group"> <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้" onkeyup="if (/\W/g.test(this.value)) this.value = this.value.replace(/\W/g,'')" required> </div>
            <div class="form-group">
              <div class="input-group">
                <input type="password" name="password" id="show_password" class="form-control" placeholder="รหัสผ่าน" onkeyup="if (/\W\D/g.test(this.value)) this.value = this.value.replace(/\W\D/g,'')" maxlength="8" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="label_password" onchange="document.getElementById('show_password').type = this.checked ? 'text' : 'password'">
                      <label class="custom-control-label" for="label_password">ดู</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">ยืนยัน</button>
            <a href="<?=site_url('auth/register');?>" class="btn btn-link float-right">ลงทะเบียน</a>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-12">
      <?php $this->load->view('_partials/message'); ?>
    </div>
  </div>
</div>
