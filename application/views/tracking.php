<div class="container-fluid my-5">
  <div class="row">

    <div class="col-sm-10 mx-auto">
      <table class="table table-border-less">
        <thead class="thead-light">
          <tr>
            <th>ชื่อผู้รับ</th>
            <th>เบอร์โทรศัพท์</th>
            <th class="text-center" style="width:15%;">จำนวนสินค้า</th>
            <th class="text-right">หมายเลขพัสดุ</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tracking as $_tr => $tr) { ?>
            <tr>
              <td><?=$tr['fullname'];?></td>
              <td><?=$tr['phone'];?></td>
              <td class="text-center"><?=$tr['total_quantity'];?></td>
              <td class="text-right"><?=$tr['tracking_number'];?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

      <div class="d-flex justify-content-center mt-3">
        <?=$this->pagination->create_links();?>
      </div>
    </div>

  </div>
</div>
