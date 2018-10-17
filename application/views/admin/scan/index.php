<div class="d-flex justify-content-between align-items-center w-100">
  <h4>รายการค้นหาคิวอาร์โค้ด</h4>
</div>
<br>
<?php foreach ($scan as $_sc => $sc) { ?>
  <div class="media text-muted pt-1 border-top border-gray">
    <div class="media-body p-3 mb-0 small lh-125">
      <div class="d-flex justify-content-between">
        <strong class="lead text-gray-dark"> วันที่ : <u><?=$sc['datetime'];?></u> </strong>
        <span class=""> ผู้ค้นหา : <u><?=$sc['qr_code'];?></u> </span>
      </div>
      <span class="d-block"> รหัสคิวอาร์โค้ด : <u><?=$sc['id_card'];?></u> </span>
    </div>
  </div>
<?php } ?>

<div class="d-flex justify-content-center mt-3">
  <?=$this->pagination->create_links();?>
</div>
