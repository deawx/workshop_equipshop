<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <div class="container">
    <a class="navbar-brand p-0" href="#"><img src="<?=base_url('assets/images/logo.png');?>" class="m-0 p-0" style="height:28px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"> <a class="nav-link active" href="<?=site_url();?>">หน้าหลัก</a> </li>
      </ul>
      <?php if (isset($session['is_login']) && ! in_array($this->uri->segment('1'),array('auth','user','cart'))) { ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"> <a class="nav-link active" href="<?=site_url('cart');?>">ตะกร้าสินค้า</a> </li>
        </ul>
      <?php } ?>
    </div>
  </div>
</nav>
<?php if ($this->uri->segment('1') === 'cart') { ?>
  <div class="nav-scroller bg-white shadow-sm">
    <div class="container">
      <nav class="nav nav-underline">
        <a class="nav-link active" href="<?=site_url('cart/history');?>">ประวัติการสั่งซื้อ</a>
        <a class="nav-link" href="<?=site_url('cart/confirm');?>">ยืนยันการโอนเงิน</a>
      </nav>
    </div>
  </div>
<?php } ?>
