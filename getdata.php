<?php
  $output = shell_exec('ls -1 *.mp3');
  $files = preg_split("/[\n]+/", trim($output));

  $count = 1;

  #echo gettype($files);  

  #$ret = array('ID' => '1', 'Name' => 'eam130816.mp3', 'Date' => '20130816');
  echo '{ "programs" : [';
  foreach ($files as $file) {
     echo "{ \"ID\" : \"$count\",";
     echo "\"Name\" : \"$file\",";
     echo "\"Date\" : \"20" . preg_replace('/ezm(\w+).mp3/', '\1', $file) . "\"}";
     if ($count < sizeof($files))echo ',';
     $count = $count + 1;
  }
  echo "]}\n";
?>
