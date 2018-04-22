<?php
$files = scandir('backdoors');
$i     = 0;
foreach ($files as $file) {
    if ($file == '.' || $file == '..')
        continue;
    $sha1 = sha1_file('backdoors/' . $file);
    echo '' . $file . ' - <b>' . $sha1 . '</b><br />';
    $i++;
}
echo '<br /><br /> There was <b>' . $i . '</b> files scanned.';
?>