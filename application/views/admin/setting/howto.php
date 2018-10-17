<div class="d-flex justify-content-between align-items-center w-100">
  <h4>รายการขั้นตอนการใช้งาน</h4>
  <a href="<?=site_url('admin/setting/howto_form');?>" class="">เพิ่มรายการ</a>
</div>
<br>
<?php foreach ($howtos as $_bk => $bk) { ?>
  <div class="media text-muted pt-1 border-top border-gray">
    <div class="media-body p-3 mb-0 small lh-125">
      <div class="d-flex justify-content-between align-items-center w-100">
        <strong class="lead text-gray-dark">หัวข้อ : <u><?=$bk['title'];?></u></strong>
        <span>
          <a href="<?=site_url('admin/setting/howto_form/'.$bk['id']);?>" class="">แก้ไข</a> |
          <a href="<?=site_url('admin/setting/howto?method=delete&id='.$bk['id']);?>" onclick="return confirm('ยืนยันการลบข้อมูล?');">ลบ</a>
        </span>
      </div>
      <p class=""> <?=$bk['description'];?> </p>
    </div>
    <?php if ($bk['picture'] !== '') { ?>
      <figure class="figure">
        <img src="<?=base_url('uploads/howto/'.$bk['picture']);?>" class="figure-img img-fluid rounded ml-1" style="width:100px;height:100px;">
        <figcaption class="figure-caption text-center"><a href="<?=site_url('admin/setting/howto?method=delete&file='.$bk['picture']);?>" class="" onclick="return confirm('ยืนยันการลบรูปภาพนี้?');">ลบ</a></figcaption>
      </figure>
    <?php } ?>
  </div>
<?php } ?>
