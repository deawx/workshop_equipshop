<div class="container-fluid my-5">
  <div class="row">

    <div class="col-sm-8">
      <div class="col-md-11 mx-auto">
        <?php if (isset($checkin_success)) { ?>
          <div class="border border-success rounded bg-light text-dark p-3">
            <h4 class="">เรียกดูข้อมูลเสร็จสิ้น !</h4>
            <hr>
            <div class="text-center mb-3">
              <img src="<?=base_url('uploads/order/'.$checkin_success['picture']);?>" class="img-thumbnail" width="400" height="400">
            </div>
            <p>ชื่อ-นามสกุล : <?=$checkin_success['firstname'].' '.$checkin_success['lastname'];?></p>
            <p>หมายเลขบัตรประชาชน : <?=$checkin_success['id_card'];?></p>
            <p>เบอร์โทรศัพท์ : <?=$checkin_success['phone'];?></p>
            <p>
              <div class="row">
                <div class="col-md-4"> เพศ : <?=$checkin_success['gender'];?> </div>
                <div class="col-md-4"> วันเกิด : <?=$checkin_success['birthdate'];?> </div>
                <div class="col-md-4"> </div>
              </div>
            </p>
            <p>
              <div class="row">
                <div class="col-md-4"> กรุ๊ปเลือด : <?=$checkin_success['blood'];?> </div>
                <div class="col-md-4"> ส่วนสูง : <?=$checkin_success['height'];?> </div>
                <div class="col-md-4"> น้ำหนัก : <?=$checkin_success['weight'];?> </div>
              </div>
            </p>
            <p>
              <div class="row">
                <div class="col-md-4"> สัญชาติ : <?=$checkin_success['nationality'];?> </div>
                <div class="col-md-4"> ศาสนา : <?=$checkin_success['religion'];?> </div>
                <div class="col-md-4"> </div>
              </div>
            </p>
            <p>ข้อมูลการรักษาพยาบาล : <?=$checkin_success['hospital'];?></p>
            <p>
              <div id="map" class="w-100" style="height:400px;"></div>
              <script>
              function initMap() {
                var uluru = {lat: <?=$checkin_success['latitude'];?>, lng: <?=$checkin_success['longtitude'];?>};
                var map = new google.maps.Map(
                  document.getElementById('map'), {zoom: 4, center: uluru});
                  var marker = new google.maps.Marker({position: uluru, map: map});
                }
                </script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC1HqMP74IoVLsfSuL54twrQlkCKH4gG4&callback=initMap"> </script>
              </p>
              <hr>
              <p class="d-flex justify-content-between mb-0">
                <span> โดย : <?=$this->input->get('id_card');?> </span>
                <span> วันที่ : <?=date('Y-m-d H:i:s');?> </span>
              </p>
            </div>
          <?php } else { ?>
            <form class="needs-validation" action="" method="get" novalidate>
              <div class="form-group row"> <label for="" class="col-from-label col-md-4 text-right">รหัสคิวอาร์โค้ด ที่นี่</label>
                <div class="col-md-8"> <input type="text" class="form-control" name="qr_code" value="<?=$this->input->get('qr_code');?>" required> </div>
              </div>
              <div class="form-group row"> <label for="" class="col-from-label col-md-4 text-right">ยืนยันเลขบัตรประชาชน</label>
                <div class="col-md-8"> <input type="text" class="form-control" name="id_card" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="13" required> </div>
              </div>
              <div class="form-group row"> <label for="" class="col-from-label col-md-4 text-right"></label>
                <div class="col-md-8"> <button class="btn btn-success btn-block" type="submit">ค้นหาข้อมูล</button> </div>
              </div>
            </form>
            <hr>
            <p class="text-danger"> * สแกนข้อมูลคิวอาร์โค้ดเพื่อเรียกดูข้อมูลส่วนบุคคลที่ได้ทำการบันทึกเข้าสู่ระบบเอาไว้ </p>
            <p class="text-danger"> * ระบุตัวบุคคลผู้ใช้ด้วยหมายเลขบัตรประจำตัวประชาชนของท่าน </p>
          <?php } ?>
          <?php $this->load->view('_partials/message'); ?>
        </div>
      </div>

      <div class="col-sm-4">
        <?php if (isset($session['is_login'])) { ?>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">เข้าสู่ระบบเรียบร้อย.</h5>
              <div class="card-text">
                <p>ชื่อ-นามสกุล : <u><?=$session['firstname'].' '.$session['lastname'];?></u></p>
                <p>ชื่อผู้ใช้ : <u><?=$session['username'];?></u></p>
              </div>
              <hr>
              <a href="<?=site_url('user');?>" class="btn btn-primary">แก้ไขข้อมูล</a>
              <a href="<?=site_url('auth/logout');?>" class="btn btn-light text-dark">ออกจากระบบ</a>
            </div>
          </div>
          <?php if (isset($session['is_admin'])) { ?>
            <br>
            <div class="card">
              <div class="card-body">
                <a href="<?=site_url('admin/scan');?>" class="btn btn-primary">เข้าสู่ระบบผู้ดูแล</a>
              </div>
            </div>
          <?php } ?>
        <?php } else { ?>
          <div class="card">
            <div class="card-header"> เข้าสู่ระบบ </div>
            <div class="card-body">
              <form class="needs-validation" action="<?=site_url('auth/login');?>" method="post" novalidate>
                <div class="form-group"> <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้" required> </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" name="password" id="show_password" class="form-control" placeholder="รหัสผ่าน" onkeyup="if (/\W\D/g.test(this.value)) this.value = this.value.replace(/\W\D/g,'')" maxlength="8" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="label_password" onchange="document.getElementById('show_password').type = this.checked ? 'text' : 'password'">
                          <label class="custom-control-label" for="label_password">ดู</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                <a href="<?=site_url('auth/register');?>" class="btn btn-link">ลงทะเบียน</a>
                <a href="<?=site_url('auth/login_admin');?>" class="btn btn-link float-right">ผู้ดูแลระบบ</a>
              </form>
            </div>
          </div>
        <?php } ?>
        <br>
        <div class="card">
          <div class="card-header"> หมายเลขติดตามสินค้า </div>
          <div class="card-body">
            <div class="list-group">
              <div class="d-flex w-100 justify-content-between border-bottom mb-1">
                <p class="text-info">ชื่อผู้รับ</p>
                <p class="text-info">หมายเลขพัสดุ</p>
              </div>
              <?php foreach ($tracking as $_tr => $tr) { ?>
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1"><?=$tr['fullname'];?></h5>
                  <small class="text-muted"><?=$tr['tracking_number'];?></small>
                </div>
              <?php } ?>
            </div>
            <a href="<?=site_url('welcome/tracking');?>" class="btn btn-link btn-sm float-right">ดูทั้งหมด</a>
          </div>
        </div>
      </div>

    </div>
  </div>
