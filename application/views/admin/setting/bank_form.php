<div class="row">
  <div class="col-md-8">

    <h4 class="mb-3">ข้อมูลบัญชีธนาคาร</h4>
    <hr>
    <?=form_open_multipart();?>
    <?php
    if (isset($bank['id']))
    { ?>
      <input type="hidden" name="id" value="<?=isset($bank['id'])?$bank['id']:NULL;?>">
      <?php
    }
    if ( ! isset($bank['picture']) OR $bank['picture'] === '')
    { ?>
      <div class="form-group"> <label for="">ไฟล์รูปภาพ</label>
        <div class="custom-file"> <input type="file" name="picture" class="form-control-file"> </div>
      </div>
      <?php
    } ?>
    <br>
    <div class="form-group">
      <label for="">ชื่อธนาคาร</label>
      <input type="text" class="form-control" name="bank" value="<?=set_value('bank',isset($bank['bank'])?$bank['bank']:NULL);?>" required>
    </div>
    <div class="form-group">
      <label for="">ชื่อบัญชีธนาคาร</label>
      <input type="text" class="form-control" name="name" value="<?=set_value('name',isset($bank['name'])?$bank['name']:NULL);?>" required>
    </div>
    <div class="form-group">
      <label for="">หมายเลขบัญชีธนาคาร</label>
      <input type="text" class="form-control" name="account" value="<?=set_value('account',isset($bank['account'])?$bank['account']:NULL);?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="15" required>
    </div>
    <hr>
    <button class="btn btn-success btn-block" type="submit" onclick="return confirm('ยืนยันการบันทึกข้อมูล?');">บันทึกข้อมูล</button>
    <?=form_close();?>

  </div>
  <div class="col-md-4">

    <h4 class="mb-3"> คำอธิบาย </h4>
    <hr>
    <div class="text-muted">
      <p class="text-danger">* กรอกข้อมูลให้ครบทุกช่อง</p>
      <p class="text-danger">* รองรับการอัพโหลดรูปภาพชนิด *.jpeg, *.jpg, *.png</p>
    </div>

  </div>
</div>
