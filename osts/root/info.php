<?php 
echo phpinfo();
echo "<h2>gd_info()</h2>";
foreach(gd_info() as $k => $e){
  echo '<br>'.$k.":".$e;}
?>
