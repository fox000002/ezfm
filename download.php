<?php
  $prev_days = $_GET["prev"];
  exec("python ezfm.py $prev_days", $output);
  var_dump($output); 
?>
