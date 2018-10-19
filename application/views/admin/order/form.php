<form action="" class="needs-validation" method="post" novalidate>
  <div class="d-flex justify-content-between">
    <h4 class="">ข้อมูลรายการคำสั่งซื้อที่ #<?=$order['id'];?></h4>
    <button type="submit" class="btn btn-success" onclick="return confirm('ยืนยันการบันทึกข้อมูล?')">บันทึกข้อมูล</button>
  </div>
  <hr>

  <input type="hidden" name="id" value="<?=$order['id'];?>">
  <div class="row">
    <div class="col-md-8">
      <div class="form-group row"> <label for="" class="col-form-label col-md-4 text-right">วันที่สั่งซื้อ</label>
        <div class="col-md-8"> <input type="text" class="form-control-plaintext" name="" value="<?=$order['created'];?>" readonly> </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-form-label col-md-4 text-right">สถานะรายการสั่งซื้อ</label>
        <div class="col-md-8">
          <select class="form-control" name="status" id="status" required>
            <option value="ตรวจสอบการชำระเงิน" <?=set_select('status','ตรวจสอบการชำระเงิน',($order['status']=='ตรวจสอบการชำระเงิน'));?>>ตรวจสอบการชำระเงิน</option>
            <option value="การชำระเงินไม่ถูกต้อง" <?=set_select('status','การชำระเงินไม่ถูกต้อง',($order['status']=='การชำระเงินไม่ถูกต้อง'));?>>การชำระเงินไม่ถูกต้อง</option>
            <option value="รอการจัดส่ง" <?=set_select('status','รอการจัดส่ง',($order['status']=='รอการจัดส่ง'));?>>รอการจัดส่ง</option>
            <option value="สำเร็จ" <?=set_select('status','สำเร็จ',($order['status']=='สำเร็จ'));?>>สำเร็จ</option>
          </select>
        </div>
      </div>
      <div class="form-group row"> <label for="" class="col-form-label col-md-4 text-right">สถานะการชำระเงิน</label>
        <div class="col-md-8"> <input type="text" class="form-control-plaintext" name="" value="<?=isset($order['transfer_slip']) ? 'ชำระเงินแล้ว' : 'รอชำระเงิน';?>" readonly> </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-form-label col-md-4 text-right">หมายเลขแทรคกิ้ง</label>
        <div class="col-md-8"> <input type="text" class="form-control" name="tracking_number" value="<?=set_value('tracking_number',$order['tracking_number']);?>" maxlength="20"> </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-form-label col-md-4 text-right">ชื่อผู้รับ</label>
        <div class="col-md-8"> <input type="text" class="form-control-plaintext" value="<?=$order['fullname'];?>" readonly> </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-form-label col-md-4 text-right">เบอร์โทรศัพท์</label>
        <div class="col-md-8"> <input type="text" class="form-control-plaintext" value="<?=$order['phone'];?>" readonly> </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-form-label col-md-4 text-right">ที่อยู่จัดส่ง</label>
        <div class="col-md-8"> <input type="text" class="form-control-plaintext" value="<?=$order['address'];?>" readonly> </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="d-flex flex-column align-items-center">
        <p class="">หลักฐานการชำระเงิน</p>
        <img src="<?=base_url('uploads/order/'.$order['transfer_slip']);?>" class="img-thumbnail rounded">
      </div>
    </div>
  </div>
</form>

<div class="row">
  <div class="col-md-12 mt-3">
    <h4 class="mb-3"> รายการสินค้าจำนวน <?=$order['total_quantity'];?> รายการ </h4>
    <hr>
    <?php foreach ($order['order_detail'] as $_od => $od) { ?>
      <div class="media">
        <img class="mr-3" src="<?=base_url('uploads/product/'.$od['file1']);?>" class="rounded" style="width:100px;height:100px;">
        <div class="media-body">

          <div class="d-flex justify-content-between">
            <h5 class="mt-0">ชื่อสินค้า #<?=$od['name'];?></h5>
            <span class="">
              จำนวนสั่งซื้อ : <u><?=$od['quantity'];?></u> |
              ราคาต่อหน่วย : <u><?=$this->cart->format_number($od['price']);?></u> ฿ |
              ราคารวม : <u><?=$this->cart->format_number($od['total_price']);?></u> ฿
            </span>
          </div>
          <p style="min-height:60px;"><?=$od['detail'];?></p>

          <?php foreach ($od['order_detail_data'] as $_odd => $odd) { ?>
            <div class="media mt-3">
              <a class="pr-3" href="#"> <img class="mr-3" src="<?=base_url('uploads/order/'.$odd['picture']);?>" class="rounded" style="width:75px;height:75px;"> </a>
              <div class="media-body">
                <h5 class="mt-0">ชิ้นที่ #<?=++$_odd;?></h5>
                ชื่อ-นามสกุล : <u><?=$odd['firstname'].' '.$odd['lastname'];?></u>
                เพศ : <u><?=$odd['gender'];?></u>
                บัตรประชาชน : <u><?=$odd['id_card'];?></u>
                โทรศัพท์ : <u><?=$odd['phone'];?></u>
                <br>
                วันเกิด : <u><?=$odd['birthdate'];?></u>
                กรุ๊ปเลือด : <u><?=$odd['blood'];?></u>
                ส่วนสูง : <u><?=$odd['height'];?></u>
                น้ำหนัก : <u><?=$odd['weight'];?></u>
                <br>
                สัญชาติ : <u><?=$odd['nationality'];?></u>
                ศาสนา : <u><?=$odd['religion'];?></u>
                ข้อมูลแผนที่ : <u><?=$odd['latitude'].'-'.$odd['longtitude'];?></u>
                <br>
                ข้อมูลการรักษาพยาบาล : <u><?=$odd['hospital'];?></u>
              </div>
            </div>
            <hr>
          <?php } ?>

        </div>
      </div>
    <?php } ?>

    <p class="float-right">ราคาสุทธิ : <u><?=$this->cart->format_number($order['total_price']);?></u> ฿</p>

  </div>
</div>


<script type="text/javascript">
  $(function(){
    $('#status').editableSelect();
  });
</script>
