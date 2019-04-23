<div class="d-flex justify-content-between align-items-center w-100">
  <h4>รายการค้นหาคิวอาร์โค้ด</h4>
  <?=form_open('',array('class'=>'form-inline needs-validation','novalidate'=>TRUE,'method'=>'get'));?>
  <label for="" class="col-form-label mr-2">ค้นหาจากคิวอาร์โค้ด</label>
  <input type="text" name="qr_code" class="form-control" value="<?=$this->input->get('qr_code');?>" placeholder="คิวอาร์โค้ด">
  <button type="submit" class="btn btn-secondary">ค้นหา</button>
  <?=form_close();?>
</div>
<br>
<?php foreach ($scan as $_sc => $sc) { ?>
  <div class="media text-muted pt-1 border-top border-gray">
    <div class="media-body p-3 mb-0 small lh-125">
      <div class="d-flex justify-content-between">
        <strong class="lead text-gray-dark"> วันที่ : <u><?=$sc['datetime'];?></u> </strong>
        <span class=""> ผู้ค้นหา : <u><?=$sc['id_card'];?></u> | โทรศัพท์ : <?=$sc['mobile_number'];?> </span>
      </div>
      <span class="d-block"> รหัสคิวอาร์โค้ด : <u><?=$sc['qr_code'];?></u> </span>
    </div>
  </div>
<?php } ?>

<div class="d-flex justify-content-center mt-3">
  <?=$this->pagination->create_links();?>
</div>
