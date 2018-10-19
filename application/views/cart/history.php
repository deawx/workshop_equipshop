<div class="container-fluid py-5">
  <div class="row">
    <div class="col-md-12">

      <h4 class="mb-3">ประวัติการสั่งซื้อ</h4>
      <hr>

      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th class="text-center" style="width:15%;">รหัสคำสั่งซื้อ</th>
            <th class="text-center" style="width:20%;">วันที่</th>
            <th class="">ผู้รับสินค้า</th>
            <th class="text-right">ราคาสุทธิ</th>
            <th class="text-center" style="width:15%;">สถานะ</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($history as $_h => $h) { ?>
            <tr>
              <td class="">#<?=$h['id'];?></td>
              <td><?=$h['created'];?></td>
              <td><?=$h['fullname'];?> (โทรศัพท์ : <?=$h['phone'];?>)</td>
              <td class="text-right"><?=$this->cart->format_number($h['total_price']);?>฿</td>
              <td class="text-right">
                <a href="<?=site_url('cart/receipt/'.$h['id']);?>" class="btn btn-primary btn-sm" target="_blank">
                  <?=$h['status'];?>
                  <?//=( ! isset($h['transfer_slip']))
                    // ? 'รอการชำระเงิน'
                    // : (($h['status']==='0')
                    //   ? 'ตรวจสอบการชำระเงิน'
                    //   : (($h['status']==='1')
                    //     ? 'การชำระเงินไม่ถูกต้อง'
                    //     : (($h['status']==='2')
                    //       ? 'ระหว่างการจัดส่ง'
                    //       : 'สำเร็จ')));?>
                </a>
                <!-- <a href="<?=site_url('cart/receipt/'.$h['id']);?>" class="btn btn-primary btn-sm" target="_blank">
                  ใบเสร็จ
                </a> -->
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>
  </div>
</div>
