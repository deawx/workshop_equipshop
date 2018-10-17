<div class="container-fluid pt-5">
  <div class="row">

    <?php foreach ($products as $_pd => $pd) { ?>
      <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card h-100">
          <img class="card-img-top" src="<?=base_url('uploads/product/'.$pd['file1']);?>">
          <div class="card-body">
            <h5 class="card-title">ชื่อสินค้า : <a href="<?=site_url('product/view/'.$pd['id']);?>"><?=$pd['name'];?></a> </h5>
            <p class="card-text">รายละเอียด : <?=$pd['detail'];?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="<?=site_url('product/view/'.$pd['id']);?>" class="btn btn-sm btn-outline-secondary">ดูข้อมูล</a>
                  <?php if (isset($session['is_login']) && ! isset($session['is_admin'])) { ?>
                    <a href="<?=site_url('cart?method=insert&product_id='.$pd['id']);?>" class="btn btn-sm btn-outline-secondary">ใส่ตะกร้า</a>
                  <?php } ?>
                </div>
                <small class="text-muted"><?=$pd['price'];?>.00 ฿</small>
              </div>
          </div>
        </div>
      </div>
    <?php } ?>

  </div>
</div>
