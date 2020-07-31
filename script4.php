<?php
$filename = readline("Filename to change: ");
while (!file_exists($filename)){
	echo "File doesn't exist\n";
	$filename = readline("Filename to change: ");
}

$file_contents = file_get_contents($filename);
echo "File contents are: ".$file_contents."\n";

$find_text = readline("Text to find and replace: ");
$replace_text = readline("Replace with: ");

$new_contents = str_replace($find_text, $replace_text, $file_contents);
file_put_contents($filename, $new_contents);
echo "Changed file contents are: ".$new_contents;
?>