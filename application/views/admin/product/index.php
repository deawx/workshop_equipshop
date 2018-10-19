<div class="d-flex justify-content-between align-items-center w-100">
  <h4>รายการสินค้า</h4>
  <a href="<?=site_url('admin/product/add_product');?>" class="">เพิ่มสินค้า</a>
</div>
<br>
<?php foreach ($products as $_pd => $pd) { ?>
  <div class="media text-muted pt-1 border-top border-gray">
    <div class="media-body p-3 mb-0 small lh-125">
      <div class="d-flex justify-content-between align-items-center w-100">
        <strong class="lead text-gray-dark">ชื่อสินค้า : <u><?=$pd['name'];?></u></strong>
        <span>
          <a href="<?=site_url('admin/product/add_product/'.$pd['id']);?>" class="">แก้ไข</a> |
          <a href="<?=site_url('admin/product?method=delete&id='.$pd['id']);?>" onclick="return confirm('ยืนยันการลบข้อมูล?');">ลบ</a>
        </span>
      </div>
      <span class="d-block"><?=$pd['detail'];?></span>
    </div>
    <?php if ($pd['file1'] != '') { ?>
      <figure class="figure">
        <img src="<?=base_url('uploads/product/'.$pd['file1']);?>" class="figure-img img-fluid rounded ml-1" style="width:100px;height:100px;">
        <figcaption class="figure-caption text-center"><a href="<?=site_url('admin/product?method=delete&field=file1&file='.$pd['file1']);?>" class="" onclick="return confirm('ยืนยันการลบรูปภาพนี้?');">ลบ</a></figcaption>
      </figure>
    <?php } ?>
    <?php if ($pd['file2'] != '') { ?>
      <figure class="figure">
        <img src="<?=base_url('uploads/product/'.$pd['file2']);?>" class="figure-img img-fluid rounded ml-1" style="width:100px;height:100px;">
        <figcaption class="figure-caption text-center"><a href="<?=site_url('admin/product?method=delete&field=file2&file='.$pd['file2']);?>" class="" onclick="return confirm('ยืนยันการลบรูปภาพนี้?');">ลบ</a></figcaption>
      </figure>
    <?php } ?>
    <?php if ($pd['file3'] != '') { ?>
      <figure class="figure">
        <img src="<?=base_url('uploads/product/'.$pd['file3']);?>" class="figure-img img-fluid rounded ml-1" style="width:100px;height:100px;">
        <figcaption class="figure-caption text-center"><a href="<?=site_url('admin/product?method=delete&field=file3&file='.$pd['file3']);?>" class="" onclick="return confirm('ยืนยันการลบรูปภาพนี้?');">ลบ</a></figcaption>
      </figure>
    <?php } ?>
    <?php if ($pd['file4'] != '') { ?>
      <figure class="figure">
        <img src="<?=base_url('uploads/product/'.$pd['file4']);?>" class="figure-img img-fluid rounded ml-1" style="width:100px;height:100px;">
        <figcaption class="figure-caption text-center"><a href="<?=site_url('admin/product?method=delete&field=file4&file='.$pd['file4']);?>" class="" onclick="return confirm('ยืนยันการลบรูปภาพนี้?');">ลบ</a></figcaption>
      </figure>
    <?php } ?>
  </div>
<?php } ?>
