<div class="row">
  <div class="col-md-8">

    <h4 class="mb-3">ข้อมูลผู้ดูแลระบบ</h4>
    <hr>
    <form class="" action="" method="post">
      <input type="hidden" name="id" value="<?=isset($admin['id'])?$admin['id']:NULL;?>">
      <div class="form-group">
        <label for="">ชื่อ</label>
        <input type="text" class="form-control" name="firstname" value="<?=set_value('firstname',isset($admin['firstname'])?$admin['firstname']:NULL);?>" required>
        <small class="form-text text-muted"><?=form_error('firstname');?></small>
      </div>
      <div class="form-group">
        <label for="">นามสกุล</label>
        <input type="text" class="form-control" name="lastname" value="<?=set_value('lastname',isset($admin['lastname'])?$admin['lastname']:NULL);?>" required>
        <small class="form-text text-muted"><?=form_error('lastname');?></small>
      </div>
      <hr>
      <div class="form-group">
        <label for="">ชื่อผู้ใช้</label>
        <input type="text" class="form-control" name="username" <?=isset($admin['username']) ? "value=".$admin['username']." readonly" : '';?> onkeyup="if (/\W/g.test(this.value)) this.value = this.value.replace(/\W/g,'')" required>
        <small class="form-text text-muted"><?=form_error('username');?></small>
      </div>
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
      <button class="btn btn-success btn-block" type="submit" onclick="return confirm('ยืนยันการบันทึกข้อมูล?');">บันทึกข้อมูล</button>
    </form>

  </div>
  <div class="col-md-4">

    <h4 class="mb-3"> คำอธิบาย </h4>
    <hr>
    <div class="text-danger">
      <p>* กรอกข้อมูลให้ครบทุกช่อง</p>
      <p>* ข้อมูลชื่อผู้ใช้ประกอบด้วยตัวเลขหรือตัวอักษรภาษาอังกฤษเท่านั้น</p>
      <p>* ข้อมูลชื่อผู้ใช้ไม่สามารถเปลี่ยนแปลงได้</p>
    </div>

  </div>
</div>
