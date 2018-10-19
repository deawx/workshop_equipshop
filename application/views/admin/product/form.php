<div class="row">
  <div class="col-md-8">

    <h4 class="mb-3">รายการสินค้า</h4>
    <hr>
    <?=form_open_multipart();?>
    <?php
    if (isset($product['id']))
    { ?>
      <input type="hidden" name="id" value="<?=$product['id'];?>">
      <?php
    }
    if ( ! isset($product['file1']) OR $product['file1'] == '')
    { ?>
      <div class="form-group"> <label for="">ไฟล์รูปภาพ</label>
        <div class="custom-file"> <input type="file" name="file1" class="form-control-file"> </div>
      </div>
      <?php
    }
    if ( ! isset($product['file2']) OR $product['file2'] == '')
    { ?>
      <div class="form-group"> <label for="">ไฟล์รูปภาพ</label>
        <div class="custom-file"> <input type="file" name="file2" class="form-control-file"> </div>
      </div>
      <?php
    }
    if ( ! isset($product['file3']) OR $product['file3'] == '')
    { ?>
      <div class="form-group"> <label for="">ไฟล์รูปภาพ</label>
        <div class="custom-file"> <input type="file" name="file3" class="form-control-file"> </div>
      </div>
      <?php
    }
    if ( ! isset($product['file4']) OR $product['file4'] == '')
    { ?>
      <div class="form-group"> <label for="">ไฟล์รูปภาพ</label>
        <div class="custom-file"> <input type="file" name="file4" class="form-control-file"> </div>
      </div>
      <?php
    } ?>
    <br>
    <div class="form-group">
      <label for="">ชื่อสินค้า</label>
      <input type="text" class="form-control" name="name" value="<?=set_value('name',isset($product['name'])?$product['name']:NULL);?>" onkeyup="if (/\W/g.test(this.value)) this.value = this.value.replace(/\W/g,'')" required>
    </div>
    <div class="form-group">
      <label for="">ราคาสินค้า</label>
      <input type="text" class="form-control" name="price" value="<?=set_value('price',isset($product['price'])?$product['price']:NULL);?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="4" required>
    </div>
    <div class="form-group">
      <label for="">ข้อมูลสินค้า</label>
      <textarea class="form-control" rows="3" name="detail" required><?=set_value('detail',isset($product['detail'])?$product['detail']:NULL);?></textarea>
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
