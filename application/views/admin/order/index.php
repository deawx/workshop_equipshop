<div class="d-flex justify-content-between align-items-center w-100">
  <h4>รายการคำสั่งซื้อ</h4>
  <?=form_open('',array('class'=>'form-inline needs-validation','novalidate'=>TRUE,'method'=>'get'));?>
  <label for="" class="col-form-label mr-2">สถานะ</label>
  <select class="form-control mr-2" name="status">
    <option value="">ทั้งหมด</option>
    <?php foreach ($status as $key => $value) { ?>
      <option value="<?=$value;?>" <?=set_select('status',$value,($value==$this->input->get('status')));?>><?=$value;?></option>
    <?php } ?>
  </select>
  <button type="submit" class="btn btn-secondary">ค้นหา</button>
  <?=form_close();?>
</div>
<br>
<?php foreach ($orders as $_od => $od) { ?>
  <div class="media text-muted pt-1 border-top border-gray">
    <div class="media-body p-3 mb-0 small lh-125">
      <div class="d-flex justify-content-between align-items-center w-100">
        <strong class="lead text-gray-dark">
          วันที่ : <u><?=$od['created'];?></u> |
          หมายเลขคำสั่งซื้อ : <u>#<?=$od['id'];?></u>
        </strong>
        <span class="">
          <a href="<?=site_url('admin/order/view/'.$od['id']);?>" class="">แก้ไข</a> |
          <a href="<?=site_url('admin/order/print_qr/'.$od['id']);?>" target="_blank">ดูคิวอาร์โค้ด</a>
        </span>
      </div>
      <span class="d-block">
        สถานะรายการสั่งซื้อ : <u><?=$od['status'];?></u> |
        สถานะการชำระเงิน : <u><?=$od['transfer_slip']!='' ? 'ชำระเงินแล้ว' : 'รอชำระเงิน';?></u> |
        สถานะการจัดส่ง : <u><?=$od['tracking_number']!='' ? 'จัดส่งสินค้าเรียบร้อย' : 'รอการจัดส่ง';?></u>
      </span>
    </div>
  </div>
<?php } ?>

<div class="d-flex justify-content-center mt-3">
  <?=$this->pagination->create_links();?>
</div>
