<div class="container-fluid pt-5">

  <div class="row">
    <div class="col-md-12">
      <h3 class="border-bottom border-gray">ชื่อสินค้า : <?=$product['name'];?></h3>
    </div>
    <div class="col-md-8">
      <div id="carouselproducts" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <?php if (isset($product['file1']) && $product['file1'] != '') { ?>
            <div class="carousel-item active"> <img src="<?=base_url('uploads/product/'.$product['file1']);?>" class="d-block w-100" style="height:400px;"> </div>
          <?php } ?>
          <?php if (isset($product['file2']) && $product['file2'] != '') { ?>
            <div class="carousel-item"> <img src="<?=base_url('uploads/product/'.$product['file2']);?>" class="d-block w-100" style="height:400px;"> </div>
          <?php } ?>
          <?php if (isset($product['file3']) && $product['file3'] != '') { ?>
            <div class="carousel-item"> <img src="<?=base_url('uploads/product/'.$product['file3']);?>" class="d-block w-100" style="height:400px;"> </div>
          <?php } ?>
          <?php if (isset($product['file4']) && $product['file4'] != '') { ?>
            <div class="carousel-item"> <img src="<?=base_url('uploads/product/'.$product['file4']);?>" class="d-block w-100" style="height:400px;"> </div>
          <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselproducts" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselproducts" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <h3 class="my-3">ข้อมูลสินค้า</h3>
      <p><?=$product['detail'];?></p>
      <h3 class="my-3">รายละเอียด</h3>
      <ul>
        <li>ราคา : <?=$product['price'];?>.00 ฿</li>
      </ul>
      <?php if (isset($session['is_login']) && ! isset($session['is_admin'])) { ?>
        <div class="d-flex justify-content-between align-items-center">
          <a href="<?=site_url('cart?method=insert&product_id='.$product['id']);?>" class="btn btn-sm btn-outline-secondary">ใส่ตะกร้า</a>
          <small class="text-muted"></small>
        </div>
      <?php } ?>
    </div>
  </div>


  <div class="col-md-12">
    <h3 class="border-bottom border-gray my-3">สินค้าอื่นๆ</h3>
  </div>
  <div class="row mb-4">
    <?php foreach($product_other as $po) { ?>
      <div class="col-md-4 col-sm-4 text-center">
        <a href="<?=site_url('product/view/'.$po['id']);?>">
          <img class="img-fluid" src="<?=base_url('uploads/product/'.$po['file1']);?>" style="width:250px;height:150px;">
        </a>
      </div>
    <?php } ?>
  </div>

</div>
