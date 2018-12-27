<?php

include 'functions.php';

$link = $_GET['link'];
$s = $_GET['s'];
$e = $_GET['e'];
$single_curl = single_curl($link);

if (isset($link)) {
	$file = fopen("data.txt", "w");
	fwrite($file, $link);
	fclose($file);
}

$links = array();
if ($s == 1) {
	$links[] = $link;
}
for ($i = $s; $i <= $e; $i++) { 
	$links[] = "{$link}{$i}/";
}

$multi_curl = multi_curl($links);

preg_match_all('#<div style="background:\#f7f7f7.*?">(.*?)</div>\s*<center><div class="phantrang">#is', $multi_curl, $list_chapter);

foreach ($list_chapter[1] as $value) {
	echo strip_tags(loc($value), '<p>, <strong>, <br>') . '<hr/>';
}
