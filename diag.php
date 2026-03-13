$js = file_get_contents('c:/laragon/www/Web-Trylab/public/js/os.js');
// Basic PHP script to find unbalanced brackets or obvious syntax errors if possible.
// Wait, PHP can't parse JS. Let's write a simple Node.js check script, but we don't have Node.
// Let's use PHP to execute some JavaScript engine or fetch it locally? No.

// Let's just output the exact chars around the backticks to see if there's an issue.
$matches = [];
preg_match_all('/`/', $js, $matches, PREG_OFFSET_CAPTURE);
foreach ($matches[0] as $match) {
    echo "Backtick at: " . $match[1] . "\n";
    echo substr($js, max(0, $match[1] - 20), 40) . "\n\n";
}
