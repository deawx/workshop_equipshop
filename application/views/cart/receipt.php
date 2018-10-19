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
  <?=link_tag('assets/css/style.css');?>
  <?=isset($css) ? result_in_array($css) : NULL;?>

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <?=script_tag('assets/js/jquery.min.js');?>
  <?=script_tag('assets/js/popper.min.js');?>
  <?=script_tag('assets/js/bootstrap.min.js');?>

</head>
<body>

  <div class="container my-5">
    <div class="row">

      <div class="col-md-12 text-right d-print-none">
        <button type="button" class="btn btn-secondary" onclick="window.close()">ปิดหน้านี้</button>
        <button type="button" class="btn btn-secondary" onclick="window.print()">สั่งพิมพ์หน้านี้</button>
        <hr>
      </div>

      <div class="col-md-12">

        <div class="d-flex justify-content-between">
          <h4 class="">ข้อมูลรายการคำสั่งซื้อที่ #<?=$order['id'];?></h4>
          <span class="text-info">วันที่ : <?=$order['created'];?></span>
        </div>
        <hr>

        <div class="row">
          <div class="col-md-6 border-right border-gray">
            <p> สถานะรายการสั่งซื้อ : <u><?=($order['status']);?></u> </p>
            <p> สถานะการชำระเงิน : <u><?=($order['transfer_slip']) ? 'ชำระเงินแล้ว' : 'รอชำระเงิน';?></u> </p>
            <p> สถานะการจัดส่ง : <u><?=($order['tracking_number']) ? 'หมายเลขจัดส่ง '.$order['tracking_number'] : 'รอจัดส่ง';?></u> </p>
          </div>
          <div class="col-md-6">
            <p>ชื่อผู้รับ : <?=$order['fullname'];?></p>
            <p>เบอร์โทรศัพท์ : <?=$order['phone'];?></p>
            <p>ที่อยู่จัดส่ง : <?=$order['address'];?></p>
          </div>
        </div>
        <hr>

        <table class="table table-border">
          <thead class="thead-light">
            <tr>
              <th class="" style="">รหัสสินค้า</th>
              <th class="" style="">ชื่อสินค้า</th>
              <th class="" style="">ราคาต่อชิ้น</th>
              <th class="" style="">จำนวนสั่งซื้อ</th>
              <th class="" style="">ราคารวม</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($order['order_detail'] as $_od => $od) { ?>
              <tr>
                <td>#<?=$od['product_id'];?></td>
                <td><?=$od['name'];?></td>
                <td><?=$od['quantity'];?></td>
                <td><?=number_format($od['price'],2);?> ฿</td>
                <td><?=number_format($od['total_price'],2);?> ฿</td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

        <p class="float-right">ราคาสุทธิ : <u><?=$this->cart->format_number($order['total_price']);?></u> ฿</p>

      </div>
    </div>
  </div>

</body>
</html>
