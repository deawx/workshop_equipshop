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

  <?=isset($navbar) ? result_in_array($navbar) : NULL;?>

  <div class="container-fluid">
    <div class="row">

      <?=isset($body) ? result_in_array($body) : NULL;?>

    </div>
  </div>

  <?=isset($footer) ? result_in_array($footer) : NULL;?>
  
  <?=isset($js) ? result_in_array($js) : NULL;?>

<script type="text/javascript">
$(function(){
});
</script>
</body>
</html>
