<div class="container-fluid py-5">
  <div class="row">

    <div class="col-md-8">

      <form class="" action="" method="post" enctype="multipart/form-data">
        <h4 class="mb-3">ยืนยันการโอนเงิน</h4>
        <hr>
        <div class="form-group">
          <label for="">รายการคำสั่งซื้อ</label>
          <select class="form-control" name="order_id">
            <option value="">เลือกรายการ</option>
            <?php foreach ($order as $_od => $od) { ?>
              <option value="<?=$od['id'];?>"> รหัสคำสั่งซื้อ #<?=$od['id'];?> | <?=$od['created'];?> | <?=$od['status'];?> </option>
            <?php } ?>
          </select>
          <small class="form-text text-muted"><?=form_error('order_id');?></small>
        </div>
        <div class="form-group">
          <label for="">อัพโหลดรูปสลิป</label>
          <div class="custom-file"> <input type="file" name="file" class=""> </div>
          <small class="form-text text-muted"><?=form_error('file');?></small>
        </div>
        <hr>
        <button class="btn btn-success float-right" type="submit" onclick="return confirm('ยืนยันการบันทึกข้อมูล?');">บันทึกข้อมูล</button>
      </form>

    </div>
    <div class="col-md-4">

      <h4 class="mb-3"> คำอธิบาย </h4>
      <hr>
      <div class="text-danger">
        <p>* เลือกรายการออเดอร์สินค้าของท่าน</p>
        <p>* รองรับการอัพโหลดรูปภาพชนิด *.jpeg, *.jpg, *.png</p>
      </div>
      <br>

    </div>
  </div>
</div>
