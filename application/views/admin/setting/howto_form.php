<div class="row">
  <div class="col-md-8">

    <h4 class="mb-3">ข้อมูลขั้นตอนการใช้งาน</h4>
    <hr>
    <?=form_open_multipart();?>
    <?php
    if (isset($howto['id']))
    { ?>
      <input type="hidden" name="id" value="<?=isset($howto['id'])?$howto['id']:NULL;?>">
      <?php
    }
    if ( ! isset($howto['picture']) OR $howto['picture'] === '')
    { ?>
      <div class="form-group"> <label for="">ไฟล์รูปภาพ</label>
        <div class="custom-file"> <input type="file" name="picture" class="form-control-file"> </div>
      </div>
      <?php
    } ?>
    <br>
    <div class="form-group">
      <label for="">หัวข้อ</label>
      <input type="text" class="form-control" name="title" value="<?=set_value('title',isset($howto['title'])?$howto['title']:NULL);?>" required>
    </div>
    <div class="form-group">
      <label for="">รายละเอียด</label>
      <textarea name="description" rows="3" class="form-control" required><?=isset($howto['description'])?$howto['description']:NULL;?></textarea>
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
