<?php
# Date validation
$line = readline("Please input date <YYYYMMDD>: ");
while (DateTime::createFromFormat('Ymd', $line) == FALSE) {
   $line = readline("Please input date <YYYYMMDD>: ");
}

# Create YYYYMMDD directory if doesn't exist
$struct = "C:\data\\".$line."-php";
if (!file_exists($struct)) {
    mkdir($struct, 0777, true);
}

# Create date.txt and iterate through all available info.txt files
$filename = "date.txt";
$fh = fopen($struct."/".$filename, 'w') or die("can't open file");

$dir_iterator = new RecursiveDirectoryIterator("C:\data");
$iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);

foreach ($iterator as $file) {
	if (strpos($file, 'info.txt') !== false) {
		$filePath = str_replace("info.txt", '', $file);
		$get_file = file_get_contents($file);
		fwrite($fh, "$filePath$get_file\n");
	}
}

fclose($fh)

?>