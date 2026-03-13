<?php
$file = 'c:/laragon/www/Web-Trylab/public/js/os.js';
$c = file_get_contents($file);
// in PHP, to represent a string with backslash followed by backtick, we use '\\`'
$c = str_replace('\\`', '`', $c);
file_put_contents($file, $c);
echo "Fixed backticks\n";
?>
