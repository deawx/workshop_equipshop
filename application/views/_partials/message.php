<div class="row">
  <div class="col-md-12">
    <?php if (isset($message['primary'])) : ?>
      <div class="alert alert-primary">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Primary!</strong> <?php echo $message['primary']; ?>
      </div>
    <?php elseif (isset($message['secondary'])) : ?>
      <div class="alert alert-secondary">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Secondary!</strong> <?php echo $message['secondary']; ?>
      </div>
    <?php elseif (isset($message['success'])) : ?>
      <script type="text/javascript">
        alert("<?=$message['success'];?>");
      </script>
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Success!</strong> <?php echo $message['success']; ?>
      </div>
    <?php elseif (isset($message['info'])) : ?>
      <div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Info!</strong> <?php echo $message['info']; ?>
      </div>
    <?php elseif (isset($message['warning'])) : ?>
      <script type="text/javascript">
        alert("<?=$message['warning'];?>");
      </script>
      <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Warning!</strong> <?php echo $message['warning']; ?>
      </div>
    <?php elseif (isset($message['danger'])) : ?>
      <script type="text/javascript">
        alert("<?=$message['danger'];?>");
      </script>
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> <?php echo $message['danger']; ?>
      </div>
    <?php elseif (isset($message['light'])) : ?>
      <div class="alert alert-light">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Light!</strong> <?php echo $message['light']; ?>
      </div>
    <?php elseif (isset($message['dark'])) : ?>
      <div class="alert alert-dark">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Dark!</strong> <?php echo $message['dark']; ?>
      </div>
    <?php endif; ?>
  </div>
</div>
