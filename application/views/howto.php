<div class="container my-5">

    <div class="list-group list-group-flush">
      <?php foreach ($howtos as $key => $value) { ?>
        <div class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1 text-dark"><?=$value['title'];?></h5>
            <button type="button" class="badge badge-primary m-1"><?=++$key;?></button>
          </div>
          <p class="mb-1"> <?=$value['description'];?> </p>
          <img src="<?=base_url('uploads/howto/'.$value['picture']);?>" class="img-fluid d-block mx-auto">
        </div>
      <?php } ?>
    </div>

</div>
