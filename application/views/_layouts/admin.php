<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title></title>

  <?=link_tag('assets/css/bootstrap.min.css');?>
  <?//=link_tag('assets/css/bootstrap.litera.min.css');?>
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
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?=site_url();?>">Back to Home</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap"> <a class="nav-link" href="#">Log out</a> </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">

      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item"> <a class="nav-link active" href="<?=site_url('admin/dashboard');?>"> <i class="fa fa-dashboards"></i> Dashboard </a> </li>
          </ul>
          <h6 class="sidebar-heading d-flex align-items-center px-3 mt-4 mb-1 text-muted"> <span>Buy & Sell</span> </h6>
          <ul class="nav flex-column">
            <li class="nav-item"> <a class="nav-link" href="<?=site_url('admin/order');?>"> <i class="fa fa-list"></i> Orders </a> </li>
            <li class="nav-item"> <a class="nav-link" href="<?=site_url('admin/product');?>"> <i class="fa fa-info"></i> Products </a> </li>
          </ul>
          <h6 class="sidebar-heading d-flex align-items-center px-3 mt-4 mb-1 text-muted"> <span>Permission</span> </h6>
          <ul class="nav flex-column">
            <li class="nav-item"> <a class="nav-link" href="<?=site_url('admin/user/admins');?>"> <i class="fa fa-users"></i> Admins </a> </li>
            <li class="nav-item"> <a class="nav-link" href="<?=site_url('admin/user/users');?>"> <i class="fa fa-users"></i> Users </a> </li>
          </ul>
          <h6 class="sidebar-heading d-flex align-items-center px-3 mt-4 mb-1 text-muted"> <span>History</span> </h6>
          <ul class="nav flex-column">
            <li class="nav-item"> <a class="nav-link" href="<?=site_url('admin/export');?>"> <i class="fa fa-list"></i> Exports </a> </li>
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

  <script type="text/javascript">
    $(function(){
    });
  </script>
</body>
</html>
