<?php
$x = 5;
for ($i = 1; $i <= $x; $i++) {
  for ($k = $x; $k >= $i; $k--) {
    echo " ";
  }
  for ($j = 1; $j <= $i; $j++) {
    echo "*";
  }
  for ($l = 1; $l < $i; $l++) {
    echo "*";
  }
  echo "\n";
}
