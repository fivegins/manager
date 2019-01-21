<?php

include 'functions.php';

$link = $_GET['link'];

$html_single = single_curl($link);

preg_match('#<h2 class="title">(.*?)</h2>#is', $html_single, $chapter);
$chuong = trim($chapter[1]);

$c = preg_replace('#(.*)break-word;">(.*?)"\#modal-chap"(.*)#is', '$2', $html_single);
$c = preg_replace('#<a href=(.*)<a href=#is', '', $c);
$c = preg_replace('#(.*)<p>(.*)#is', '$1', $c);
$c = preg_replace('#<div(.*?)</div>#is', '', $c);
$c = preg_replace('#<script(.*?)</script>#is', '', $c);

$c = preg_replace('/  +/', ' ', $c);
$c = preg_replace('/\t/', '', $c);
$c = preg_replace('/\n/', '<br />', $c);
$c = preg_replace('/<br\s*\/?>(?:\s*<br\s*\/?>)+/', '<br /><br />', $c);

$c = loc($c);

// show
echo $chuong;
echo '<br>➥<br>➥<br><br>';
echo $c;
echo '<br>⊙⊙';
