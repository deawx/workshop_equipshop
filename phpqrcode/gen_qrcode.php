<?php
include('qrlib.php');
QRcode::png($_GET['w'],false, QR_ECLEVEL_L, 4, 0);
?>