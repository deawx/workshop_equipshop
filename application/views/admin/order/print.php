<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>รายการคิวอาร์โค้ด</title>
  <?=link_tag('assets/css/bootstrap.min.css');?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <div class="container mt-5">
    <div class="d-flex justify-content-between d-print-none">
      <h2 class="">รายการคิวอาร์โค้ด</h2>
      <small class="text-right">
        <button type="button" class="btn btn-light" onclick="window.close()">ปิดหน้านี้</button>
        <button type="button" class="btn btn-light" onclick="window.print()">สั่งพิมพ์หน้านี้</button>
      </small>
    </div>
    <hr>
    <div class="row">
      <?php foreach ($qrcode as $_qr => $qr) { ?>
        <div class="col-md-3 col-sm-4">
          <div class="">
            <img class="border p-1 w-100 h-100" src="<?=base_url();?>phpqrcode/gen_qrcode.php?w=<?=site_url('welcome?qr_code=').$qr['qr_code'];?>" alt="<?=$qr['qr_code'];?>">
            <small class="text-muted text-center"><?=$qr['qr_code'].' ('.$qr['firstname'].' '.$qr['lastname'].')';?></small>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <?=script_tag('assets/js/jquery.min.js');?>
  <?=script_tag('assets/js/bootstrap.min.js');?>
</body>
</html>
