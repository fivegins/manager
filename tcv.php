<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php

include 'functions.php';

if (isset($_POST['submit'])) {
	extract($_POST);

	for ($i = $s; $i <= $e; $i++) { 
		$urls[] = $link . 'chuong-' . $i . '/';
	}

	$content = multi_curl($urls);
	preg_match_all('#<title>(.*?)</title>#is', $content, $tit);

	echo '<p><a style="background-color: yellow" href="get.php?link=' . $link . '&s=' . $s . '&e=' . $e . '">
		get.php?link=' . $link . '&s=' . $s . '&e=' . $e . '
	</a></p>';
	foreach ($tit[1] as $key => $value) {
		$value = preg_replace('/.*?-\s*(.*)/', '$1', $value);
		echo "<pre>$key => $value</pre>\n";
	}

	$info = array('link' => $link, 's' => $s, 'e' => $e);
	file_put_contents( "info.txt", json_encode($info) );

}

$infos = json_decode(file_get_contents("info.txt"), true);

?>

<div style="background-color: #ccc; padding: 10px">
<form method="post" style="margin: 0">
	<input type="text" name="link" placeholder="link" value="<?php echo (isset($_POST['link'])) ? $_POST['link'] : $infos['link'] ?>" style="width: 100%; margin-bottom: 10px"><br>
	<input type="text" name="s" placeholder="s" value="<?php echo (isset($_POST['s'])) ? $_POST['s'] : $infos['s'] ?>" style="margin-bottom: 10px"><br>
	<input type="text" name="e" placeholder="e" value="<?php echo (isset($_POST['e'])) ? $_POST['e'] : $infos['e'] ?>" style="margin-bottom: 10px"><br>
	<input type="submit" name="submit" value="GET">
</form>
</div>
<p><?php echo $infos['link'] ?>&<?php echo $infos['s'] ?>&<?php echo $infos['e'] ?></p>
