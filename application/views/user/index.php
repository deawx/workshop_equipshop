<div class="container-fluid">
  <div class="col-lg-8 mx-auto">
    <div class="card my-5">
      <h5 class="card-header text-center">ข้อมูลผู้ใช้</h5>
      <div class="card-body">
        <form class="needs-validation" action="" method="post" novalidate>
          <input type="hidden" name="id" value="<?=isset($user['id'])?$user['id']:NULL;?>">
          <div class="form-group"> <input type="text" name="firstname" class="form-control" placeholder="ชื่อ" value="<?=set_value('firstname',$user['firstname']);?>" required> </div>
          <div class="form-group"> <input type="text" name="lastname" class="form-control" placeholder="นามสกุล" value="<?=set_value('lastname',$user['lastname']);?>" required> </div>
          <hr>
          <div class="form-group"> <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้" onkeyup="if (/\W/g.test(this.value)) this.value = this.value.replace(/\W/g,'')" value="<?=$user['username'];?>" readonly> </div>
          <div class="form-group">
            <div class="input-group">
              <input type="password" name="password" id="show_password" class="form-control" placeholder="รหัสผ่าน" onkeyup="if (/\W\D/g.test(this.value)) this.value = this.value.replace(/\W\D/g,'')" maxlength="8">
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
              <input type="password" name="password_confirm" id="show_password_confirm" class="form-control" placeholder="รหัสผ่าน(ยืนยัน)" onkeyup="if (/\W\D/g.test(this.value)) this.value = this.value.replace(/\W\D/g,'')" maxlength="8">
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
          <hr>
          <button class="btn btn-success btn-block" type="submit" onclick="return confirm('submit this form?');">ยืนยัน</button>
        </form>
      </div>
    </div>
    <?php $this->load->view('_partials/message'); ?>
  </div>
</div>
