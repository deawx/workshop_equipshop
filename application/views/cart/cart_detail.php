<div class="container-fluid py-5">
  <div class="row">
    <div class="col-md-8">

      <form action="" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
        <h4 class="mb-3">ข้อมูลประกอบสินค้า</h4>
        <hr>

        <div class="accordion" id="accd">

          <?php $i = 1; ?>
          <?php foreach ($cart as $_c => $c) { ?>
            <?php for ($ii=1; $ii<=$c['qty']; $ii++) { ?>

              <div class="card">
                <div class="card-header" id="hdd<?=$i.$ii;?>">
                  <h5 class="mb-0"> <a href="#" class="btn btn-link" data-toggle="collapse" data-target="#clp<?=$i.$ii;?>" aria-expanded="true" aria-controls="clp<?=$i.$ii;?>"> ชื่อสินค้า : <?=strtoupper($c['name']);?> (ชิ้นที่ <?=$ii;?>) </a> </h5>
                </div>
                <div id="clp<?=$i.$ii;?>" class="collapse <?=($i==1 & $ii==1)?'show':'';?> border-none" aria-labelledby="hdd<?=$i.$ii;?>" data-parent="#accd">
                  <div class="card-body">
                    <input type="hidden" name="<?=$i.$ii;?>[rowid]" value="<?=$c['rowid'];?>">

                    <div class="form-group"> <label for="">รูปภาพ</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file<?=$i.$ii;?>" required>
                        <label class="custom-file-label" for="">อัพโหลดรูปภาพ...</label>
                        <div class="invalid-feedback">* รองรับไฟล์รูปภาพชนิด *.jpeg, *.jpg, *.png เท่านั้น</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6"> <label for="">ชื่อ</label>
                          <input type="text" class="form-control" name="<?=$i.$ii;?>[firstname]" value="<?=set_value($i.$ii.'[firstname]');?>" required>
                        </div>
                        <div class="col-md-6"> <label for="">นามสกุล</label>
                          <input type="text" class="form-control" name="<?=$i.$ii;?>[lastname]" value="<?=set_value($i.$ii.'[lastname]');?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group"> <label for="">หมายเลขบัตรประชาชน</label>
                      <input type="text" class="form-control" name="<?=$i.$ii;?>[id_card]" value="<?=set_value($i.$ii.'[id_card]');?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="13" required>
                    </div>
                    <div class="form-group">
                      <label for="">วันเกิด</label>
                      <div class="row">
                        <div class="col-md-4">
                          <select class="form-control" name="<?=$i.$ii;?>[d]" required>
                            <option value="" selected disabled hidden>วัน</option>
                            <?php foreach (range('1','31') as $_d) { ?>
                              <option value="<?=$_d;?>" <?=set_select($i.$ii.'[d]',$_d,($i.$ii.'[d]'===$_d));?>><?=$_d;?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <select class="form-control" name="<?=$i.$ii;?>[m]" required>
                            <option value="" selected disabled hidden>เดือน</option>
                            <?php foreach (dropdown_month() as $_k => $_m) { ?>
                              <option value="<?=$_k;?>" <?=set_select($i.$ii.'[m]',$_k,($i.$ii.'[m]'===$_k));?>><?=$_m;?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <select class="form-control" name="<?=$i.$ii;?>[y]" required>
                            <option value="" selected disabled hidden>ปี พ.ศ.</option>
                            <?php foreach (range('2500',(date('Y')+543)) as $_y) { ?>
                              <option value="<?=$_y;?>" <?=set_select($i.$ii.'[y]',$_y,($i.$ii.'[y]'===$_y));?>><?=$_y;?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group"> <label for="">หมายเลขโทรศัพท์</label>
                            <input type="text" class="form-control" name="<?=$i.$ii;?>[phone]" value="<?=set_value($i.$ii.'[phone]');?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="10" required>
                          </div>
                        </div>
                        <div class="col-md-3"> <label for="">เพศ</label>
                          <select class="form-control" name="<?=$i.$ii;?>[gender]" required>
                            <option value="" selected disabled hidden>เลือกรายการ</option>
                            <?php foreach (array('ชาย','หญิง') as $_g) { ?>
                              <option value="<?=$_g;?>" <?=set_select($i.$ii.'[gender]',$_g,($i.$ii.'[gender]'===$_g));?>><?=$_g;?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="col-md-3"> <label for="">กรุ๊ปเลือด</label>
                          <select class="form-control" name="<?=$i.$ii;?>[blood]" required>
                            <option value="" selected disabled hidden>เลือกรายการ</option>
                            <?php foreach (array('A','B','AB','O') as $_b) { ?>
                              <option value="<?=$_b;?>" <?=set_select($i.$ii.'[blood]',$_b,($i.$ii.'[blood]'===$_b));?>><?=$_b;?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6"> <label for="">ส่วนสูง(เซ็นติเมตร)</label>
                          <input type="text" class="form-control" name="<?=$i.$ii;?>[height]" value="<?=set_value($i.$ii.'[height]');?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="3" required>
                        </div>
                        <div class="col-md-6"> <label for="">น้ำหนัก(กิโลกรัม)</label>
                          <input type="text" class="form-control" name="<?=$i.$ii;?>[weight]" value="<?=set_value($i.$ii.'[weight]');?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="3" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6"> <label for="">สัญชาติ</label>
                          <input type="text" class="form-control" name="<?=$i.$ii;?>[nationality]" value="<?=set_value($i.$ii.'[nationality]');?>" required>
                        </div>
                        <div class="col-md-6"> <label for="">ศาสนา</label>
                          <input type="text" class="form-control" name="<?=$i.$ii;?>[religion]" value="<?=set_value($i.$ii.'[religion]');?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group"> <label for="">ข้อมูลแผนที่</label>
                      <div class="row">
                        <div class="col-md-6"> <input type="text" class="form-control" name="<?=$i.$ii;?>[latitude]" value="<?=set_value($i.$ii.'[latitude]');?>" placeholder="ละติจุด" required> </div>
                        <div class="col-md-6"> <input type="text" class="form-control" name="<?=$i.$ii;?>[longtitude]" value="<?=set_value($i.$ii.'[longtitude]');?>" placeholder="ลองติจุด" required> </div>
                      </div>
                    </div>
                    <div class="form-group"> <label for="">ข้อมูลการรักษาพยาบาล</label>
                      <textarea name="<?=$i.$ii;?>[hospital]" class="form-control" required><?=set_value($i.$ii.'[hospital]');?></textarea>
                    </div>

                  </div>
                </div>
              </div>

            <?php } ?>
            <?php $i++; ?>
          <?php } ?>
        </div>
        <hr>
        <a href="<?=site_url('cart');?>" class="btn btn-light text-dark">ย้อนกลับ</a>
        <button class="btn btn-success float-right" type="submit" onclick="">ขั้นตอนต่อไป</button>
      </form>

    </div>
    <div class="col-md-4">

      <h4 class="mb-3"> คำอธิบาย </h4>
      <hr>
      <div class="text-danger">
        <p>* กรอกข้อมูลให้ครบทุกช่อง</p>
        <p>* ข้อมูลไม่สามารถเปลี่ยนแปลงได้</p>
        <p>* รองรับการอัพโหลดรูปภาพชนิด *.jpeg, *.jpg, *.png</p>
      </div>

    </div>
  </div>
</div>
