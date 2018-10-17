<div class="d-flex justify-content-between align-items-center w-100">
  <h4>รายการผู้ดูแลระบบ</h4>
  <a href="<?=site_url('admin/user/add_admin');?>" class="">เพิ่มผู้ดูแลระบบ</a>
</div>
<br>
<?php foreach ($admins as $_us => $us) { ?>
  <div class="media text-muted border-top border-gray">
    <div class="media-body p-3 mb-0 small lh-125">
      <div class="d-flex justify-content-between align-items-center w-100">
        <strong class="lead text-gray-dark">ชื่อ-นามสกุล : <u><?=$us['firstname'].' '.$us['lastname'];?></u></strong>
        <span>
          <a href="<?=site_url('admin/user/admins/'.$us['id']);?>" class="">แก้ไข</a> |
          <a href="<?=site_url('admin/user/admins?method=delete&id='.$us['id']);?>" class="" onclick="return confirm('ยืนยันการลบข้อมูล?');">ลบ</a>
        </span>
      </div>
      <span class="d-block">
        ชื่อผู้ใช้ : <u><?=$us['username'];?></u> |
        รหัสผ่าน : <u><?=$us['password'];?></u> |
        วันที่บันทึก : <u><?=$us['created'];?></u>
      </span>
    </div>
  </div>
<?php } ?>
