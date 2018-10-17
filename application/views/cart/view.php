<div class="container-fluid py-5">
  <div class="row">
    <div class="col-md-12">

      <div class="d-flex justify-content-between">
        <h4 class="">ข้อมูลรายการคำสั่งซื้อที่ #<?=$order['id'];?></h4>
        <span class="text-info">วันที่ : <?=$order['created'];?></span>
      </div>
      <hr>

      <div class="row">
        <div class="col-md-6 border-right border-gray">
          <p> สถานะรายการสั่งซื้อ : <u><?=($order['status']==='0') ? 'ตรวจสอบการชำระเงิน' : (($order['status']==='1') ? 'การชำระเงินไม่ถูกต้อง' : (($order['status']==='2') ? 'รอการจัดส่ง' : 'สำเร็จ'));?></u> </p>
          <p> สถานะการชำระเงิน : <u><?=($order['transfer_slip']) ? 'ชำระเงินแล้ว' : 'รอชำระเงิน';?></u> </p>
          <p> สถานะการจัดส่ง : <u><?=($order['tracking_number']) ? 'หมายเลขจัดส่ง '.$order['tracking_number'] : 'รอจัดส่ง';?></u> </p>
        </div>
        <div class="col-md-6">
          <p>ชื่อผู้รับ : <?=$order['fullname'];?></p>
          <p>เบอร์โทรศัพท์ : <?=$order['phone'];?></p>
          <p>ที่อยู่จัดส่ง : <?=$order['address'];?></p>
        </div>
      </div>
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
</div>
