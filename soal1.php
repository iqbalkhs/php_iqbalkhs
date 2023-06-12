<?php

$jml = $_GET['jml'];
$temp = 0;
$column = 0;
echo "<table border=1>\n";
for ($a = $jml; $a > 0; $a--)
{
  echo "<tr>\n";
  //untuk penjumlahan
  for ($b = $a; $b > 0; $b--){
    
    $temp += $b;
  }
    echo "<tr><th colspan='$jml'>Total : $temp</th></tr>";

  for ($b = $a; $b > 0; $b--)
  {
    echo "<td>$b</td>";
  }
  echo "</tr>\n";
  $temp = 0;
}
echo "</table>";

?>