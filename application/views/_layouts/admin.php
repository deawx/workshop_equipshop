<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title></title>

  <?=link_tag('assets/css/bootstrap.min.css');?>
  <?=link_tag('assets/css/bootstrap.minty.min.css');?>
  <?=link_tag('assets/css/fontawesome.min.css');?>
  <?=link_tag('assets/css/style_admin.css');?>
  <?=isset($css) ? result_in_array($css) : NULL;?>

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <?=script_tag('assets/js/jquery.min.js');?>
  <?=script_tag('assets/js/popper.min.js');?>
  <?=script_tag('assets/js/bootstrap.min.js');?>
  <?=isset($js) ? result_in_array($js) : NULL;?>

</head>
<body>

  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?=site_url();?>">กลับหน้าหลัก</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap"> <a class="nav-link" href="<?=site_url('auth/logout');?>">ออกจากระบบ</a> </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">

      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <h6 class="sidebar-heading d-flex align-items-center px-3 mt-4 mb-1 text-muted"> หน้าปัดและการค้นหา </h6>
          <ul class="nav flex-column">
            <li class="nav-item"> <a class="nav-link" href="<?=site_url('admin/dashboard');?>"> หน้าปัดข้อมูล </a> </li>
            <li class="nav-item"> <a class="nav-link" href="<?=site_url('admin/scan');?>"> รายการค้นหา </a> </li>
          </ul>
          <h6 class="sidebar-heading d-flex align-items-center px-3 mt-4 mb-1 text-muted"> ซื้อขายสินค้า </h6>
          <ul class="nav flex-column">
            <li class="nav-item"> <a class="nav-link" href="<?=site_url('admin/order');?>"> รายการคำสั่งซื้อ </a> </li>
            <li class="nav-item"> <a class="nav-link" href="<?=site_url('admin/product');?>"> รายการสินค้า </a> </li>
          </ul>
          <h6 class="sidebar-heading d-flex align-items-center px-3 mt-4 mb-1 text-muted"> สิทธิและการเข้าใช้งาน </h6>
          <ul class="nav flex-column">
            <li class="nav-item"> <a class="nav-link" href="<?=site_url('admin/user/admins');?>"> ผู้ดูแลระบบ </a> </li>
            <li class="nav-item"> <a class="nav-link" href="<?=site_url('admin/user/users');?>"> ผู้ใช้ทั่วไป </a> </li>
          </ul>
          <h6 class="sidebar-heading d-flex align-items-center px-3 mt-4 mb-1 text-muted"> ตั้งค่าทั่วไป </h6>
          <ul class="nav flex-column">
            <li class="nav-item"> <a class="nav-link" href="<?=site_url('admin/setting/bank');?>"> ข้อมูลบัญชีธนาคาร </a> </li>
            <li class="nav-item"> <a class="nav-link" href="<?=site_url('admin/setting/howto');?>"> ข้อมูลวิธีการสั่งซื้อสินค้า </a> </li>
            <li class="nav-item"> <a class="nav-link" href="<?=site_url('admin/setting/contact');?>"> ข้อมูลการติดต่อเรา </a> </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="my-3 p-3">

          <?=isset($body) ? result_in_array($body) : NULL;?>

        </div>
      </main>

    </div>
  </div>

</body>
</html>
