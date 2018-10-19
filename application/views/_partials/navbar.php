<div id="carousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1"></li>
    <li data-target="#carousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active"> <img src="<?=base_url('assets/images/banner_1.jpg');?>" class="d-block w-100"> </div>
    <div class="carousel-item"> <img src="<?=base_url('assets/images/banner_2.jpg');?>" class="d-block w-100"> </div>
    <div class="carousel-item"> <img src="<?=base_url('assets/images/banner_3.jpg');?>" class="d-block w-100"> </div>
  </div>
  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <a class="navbar-brand p-0" href="#"><img src="<?=base_url('assets/images/logo.png');?>" class="m-0 p-0" style="height:28px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"> <a class="nav-link active" href="<?=site_url();?>">หน้าหลัก</a> </li>
      <li class="nav-item"> <a class="nav-link" href="<?=site_url('product');?>">สินค้า</a> </li>
      <li class="nav-item"> <a class="nav-link" href="<?=site_url('welcome/howto');?>">ขั้นตอนการสั่งซื้อ</a> </li>
      <li class="nav-item"> <a class="nav-link" href="<?=site_url('welcome/contact');?>">ติดต่อเรา</a> </li>
    </ul>
    <?php if (isset($session['is_login']) && ! in_array($this->uri->segment('1'),array('auth','user','cart'))) { ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"> <a class="nav-link active" href="<?=site_url('cart');?>">ตะกร้าสินค้า</a> </li>
      </ul>
    <?php } ?>
  </div>
</nav>
