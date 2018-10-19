<link rel="stylesheet" href="<?=base_url('assets/css/datepicker.min.css');?>">
<script src="<?=base_url('assets/js/datepicker.min.js');?>" charset="utf-8"></script>
<script src="<?=base_url('assets/js/datepicker.th.min.js');?>" charset="utf-8"></script>

<div class="d-flex justify-content-between align-items-center w-100">
  <h4>สรุปรายการสั่งซื้อ</h4>
  <?=form_open('',array('class'=>'form-inline needs-validation','novalidate'=>TRUE,'method'=>'get'));?>
  <label for="" class="col-form-label mr-2">ค้นหาตามช่วงวันที่</label>
  <input type="text" name="start" class="form-control datepicker mr-2" value="<?=$this->input->get('start');?>" placeholder="วันที่เริ่ม">
  <input type="text" name="end" class="form-control datepicker mr-2" value="<?=$this->input->get('end');?>" placeholder="วันที่สิ้นสุด">
  <button type="submit" class="btn btn-secondary">ค้นหา</button>
  <?=form_close();?>
</div>
<hr>
<div class="row">
  <div class="col-md-4">
    <div class="jumbotron border rounded text-center p-3">
      <p class="text-dark border-bottom">จำนวนออเดอร์ทั้งหมด</p>
      <p><?=number_format($summary['sum_order']);?></p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="jumbotron border rounded text-center p-3">
      <p class="text-dark border-bottom">จำนวนสั่งซื้อทั้งหมด</p>
      <p><?=number_format($summary['sum_quantity']);?></p>
    </div>
    </div>
  <div class="col-md-4">
    <div class="jumbotron border rounded text-center p-3">
      <p class="text-dark border-bottom">มูลค่าสุทธิ</p>
      <p><?=number_format($summary['sum_price'],2);?> ฿</p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
          <th style="">วันที่</th>
          <th class="text-center" style="width:20%;">จำนวนสั่งซื้อ</th>
          <th class="text-center" style="width:20%;">จำนวนสินค้า</th>
          <th class="text-right" style="width:25%;">มูลค่าสุทธิ</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($orders as $_k => $v) { ?>
          <tr>
            <td><?=substr($v['created'],0,10);?></td>
            <td class="text-center"><?=$v['sum_order'];?></td>
            <td class="text-center"><?=$v['sum_quantity'];?></td>
            <td class="text-right"><?=number_format($v['sum_price'],2);?> ฿</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<script type="text/javascript">
$(function () {
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    language: 'th'
  });
});
</script>
