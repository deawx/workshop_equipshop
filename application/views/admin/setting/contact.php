<div class="row">
  <div class="col-md-8">

    <h4 class="mb-3">ข้อมูลการติดต่อเรา</h4>
    <hr>
    <?=form_open();?>
    <input type="hidden" name="id" value="<?=$contact['id'];?>">
    <div class="form-group">
      <label for="">ที่อยู่อีเมล์</label>
      <input type="email" class="form-control" name="email" value="<?=set_value('email',isset($contact['email'])?$contact['email']:NULL);?>" required>
    </div>
    <div class="form-group">
      <label for="">หมายเลขโทรศัพท์</label>
      <input type="text" class="form-control" name="phone" value="<?=set_value('phone',isset($contact['phone'])?$contact['phone']:NULL);?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="10" required>
    </div>
    <div class="form-group">
      <label for="">ที่อยู่เฟสบุค</label>
      <input type="text" class="form-control" name="facebook" value="<?=set_value('facebook',isset($contact['facebook'])?$contact['facebook']:NULL);?>" required>
    </div>
    <div class="form-group">
      <label for="">ที่อยู่ไลน์</label>
      <input type="text" class="form-control" name="line" value="<?=set_value('line',isset($contact['line'])?$contact['line']:NULL);?>" required>
    </div>
    <div class="form-group">
      <label for="">พิกัดละติจุด</label>
      <input type="text" class="form-control" name="latitude" value="<?=set_value('latitude',isset($contact['latitude'])?$contact['latitude']:NULL);?>" required>
    </div>
    <div class="form-group">
      <label for="">พิกัดลองติจุด</label>
      <input type="text" class="form-control" name="longtitude" value="<?=set_value('longtitude',isset($contact['longtitude'])?$contact['longtitude']:NULL);?>" required>
    </div>
    <div class="form-group">
      <label for="">รายละเอียดที่อยู่</label>
      <textarea name="address" class="form-control" rows="3" required><?=set_value('address',isset($contact['address'])?$contact['address']:NULL);?></textarea>
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
      <p class="text-danger">* ข้อมูลหมายเลขโทรศัพท์เป็นตัวเลข 10 หลัก</p>
    </div>

  </div>
</div>
