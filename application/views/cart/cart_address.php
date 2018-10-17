<div class="container-fluid py-5">
  <div class="row">
    <div class="col-md-8">

      <h4 class="">ข้อมูลบัญชีธนาคาร</h4>
      <hr>
      <ul class="list-unstyled">
        <li>
          <img src="<?=base_url('assets/images/bank_scb.jpg');?>" class="" width="60" height="60">
          <img src="<?=base_url('assets/images/bank_scb_promptpay.png');?>" class="" width="240" height="60">
        </li>
        <li> ชื่อบัญชี : วรรณพร อยู่หนุน</li>
        <li> หมายเลขบัญชี : 4091002093</li>
        <li> หมายเลขพร้อมเพย์ : 0972476698</li>
      </ul>
      <br>

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
        <div class="form-group">
          <label for="">ที่อยู่จัดส่ง</label>
          <textarea name="address" class="form-control" rows="3" required><?=set_value('address');?></textarea>
          <small class="form-text text-warning"><?=form_error('address');?></small>
        </div>
        <hr>
        <a href="<?=site_url('cart/cart_detail');?>" class="btn btn-light text-dark">ย้อนกลับ</a>
        <button class="btn btn-success float-right" type="submit" onclick="return confirm('ยืนยันการบันทึกข้อมูล?');">บันทึกคำสั่งซื้อ</button>
      </form>

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
