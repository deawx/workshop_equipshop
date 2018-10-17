<div class="container py-5">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
      <div class="card mb-5">
        <h5 class="card-header text-center">ลงทะเบียน</h5>
        <div class="card-body">
          <form class="needs-validation" action="" method="post" novalidate>
          <div class="form-group"> <input type="text" name="firstname" class="form-control" placeholder="ชื่อ" value="<?=set_value('firstname');?>" required> </div>
          <div class="form-group"> <input type="text" name="lastname" class="form-control" placeholder="นามสกุล" value="<?=set_value('lastname');?>" required> </div>
          <hr>
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
          <div class="form-group">
            <div class="input-group">
              <input type="password" name="password_confirm" id="show_password_confirm" class="form-control" placeholder="รหัสผ่าน(ยืนยัน)" onkeyup="if (/\W\D/g.test(this.value)) this.value = this.value.replace(/\W\D/g,'')" maxlength="8" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="label_password_confirm" onchange="document.getElementById('show_password_confirm').type = this.checked ? 'text' : 'password'">
                    <label class="custom-control-label" for="label_password_confirm">ดู</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">ยืนยัน</button>
          <a href="<?=site_url('auth/login');?>" class="btn btn-link float-right">เข้าสู่ระบบ</a>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
