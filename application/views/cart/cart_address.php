<div class="container-fluid py-5">
  <div class="row">
    <div class="col-md-8">

      <form class="needs-validation" action="" method="post" novalidate>
        <h4 class="mb-3">ข้อมูลการจัดส่ง</h4>
        <hr>
        <div class="form-group">
          <label for="">ชื่อ-นามสกุล</label>
          <input type="text" name="fullname" class="form-control" value="<?=set_value('fullname');?>" required>
          <small class="form-text text-warning"><?=form_error('fullname');?></small>
        </div>
        <div class="form-group">
          <label for="">เบอร์โทรศัพท์</label>
          <input type="text" class="form-control" name="phone" value="<?=set_value('phone');?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="10" required>
          <small class="form-text text-warning"><?=form_error('phone');?></small>
        </div>
        <div class="form-group row">
          <label for="" class="col-form-label col-md-12">ประวัติที่อยู่จัดส่ง</label>
          <ul class="" style="list-style-type:square;">
            <?php foreach ($addresses as $key => $value) { ?>
              <li> <?=$value['address'];?> </li>
            <?php } ?>
          </ul>
        </div>
        <div class="form-group">
          <label for="">ที่อยู่จัดส่ง</label>
          <textarea name="address" class="form-control" rows="3" required><?=set_value('address');?></textarea>
          <small class="form-text text-warning"><?=form_error('address');?></small>
        </div>
        <hr>
        <a href="<?=site_url('cart/cart_detail');?>" class="btn btn-light text-dark">ย้อนกลับ</a>
        <button class="btn btn-success float-right" type="submit" onclick="return confirm('ยืนยันการบันทึกข้อมูล?');">บันทึกคำสั่งซื้อ</button>
      </form>

      <br>
      <h4 class="">ข้อมูลบัญชีธนาคาร</h4>
      <hr>
      <?php foreach ($banks as $_k => $v) { ?>
        <div class="media">
          <div class="media-body">
            <h5 class="mt-0 mb-1"><?=$v['bank'];?></h5>
            ชื่อบัญชี : <?=$v['name'];?> <br>
            หมายเลขบัญชี : <?=$v['account'];?>
          </div>
          <img src="<?=base_url('uploads/bank/'.$v['picture']);?>" class="d-flex ml-3 img-fluid" style="height:100px;">
        </div>
        <hr>
      <?php } ?>

    </div>
    <div class="col-md-4">

      <h4 class="mb-3"> คำอธิบาย </h4>
      <hr>
      <div class="text-danger">
        <p>* กรอกข้อมูลให้ครบทุกช่อง</p>
        <p>* ข้อมูลหมายเลขโทรศัพท์เป็นตัวเลข 10 หลัก</p>
        <p>* ข้อมูลไม่สามารถเปลี่ยนแปลงได้</p>
      </div>

    </div>
  </div>
</div>
