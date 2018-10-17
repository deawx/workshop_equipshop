<div class="container-fluid py-5">
  <div class="row">
    <div class="col-md-12">

      <div class="d-flex justify-content-between align-items-end">
        <h4 class="">รถเข็นของคุณ</h4>
        <small class="">* ใส่จำนวนเลข 0 เพื่อลบสินค้าออกจากตะกร้า</small>
      </div>
      <hr>

      <form class="" action="" method="post">
        <table class="table table-bordered table-hover">
          <thead class="thead-light">
            <tr>
              <!-- <th class="text-center" style="width:5%;">#</th> -->
              <th class="">รายการสินค้า</th>
              <th class="text-center" style="width:15%;">จำนวน</th>
              <th class="text-right" style="width:15%;">ราคาต่อหน่วย</th>
              <th class="text-right" style="width:15%;">ราคารวม</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($cart as $items) { ?>
              <input type="hidden" name="<?=$i;?>[rowid]" value="<?=$items['rowid'];?>">
              <tr>
                <!-- <td class="text-center"> <a href="<?=site_url('cart?method=remove&rowid='.$items['rowid']);?>" class="btn btn-sm btn-warning" onclick="return confirm('ลบรายการสินค้านี้?');">ลบ</a> </td> -->
                <td> <?=$items['name'];?> </td>
                <td class="text-center"> <input type="text" name="<?=$i;?>[qty]" class="form-control" value="<?=$items['qty'];?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="2" required> </td>
                <td class="text-right"><?=$this->cart->format_number($items['price']);?> ฿</td>
                <td class="text-right"><?=$this->cart->format_number($items['subtotal']);?> ฿</td>
              </tr>
              <?php $i++;?>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="2"> </td>
              <td class="text-right"><strong>ราคาสุทธิ</strong></td>
              <td class="text-right"><?=$this->cart->format_number($this->cart->total());?> ฿</td>
            </tr>
          </tfoot>
        </table>
        <a href="<?=site_url('product');?>" class="btn btn-secondary">เลือกสินค้าต่อ</a>
        <button type="submit" class="btn btn-primary">อัพเดท</button>
        <a href="<?=site_url('cart?method=destroy');?>" class="btn btn-light text-dark" onclick="return confirm('ยกเลิกตะกร้าสินค้านี้?');">ล้างรถเข็น</a>
        <a href="<?=site_url('cart/cart_detail');?>" class="btn btn-success float-right">ขั้นตอนต่อไป</a>
      </form>

      <br>
      <?php $this->load->view('_partials/message'); ?>

    </div>
  </div>
</div>
