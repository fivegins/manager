<?php

include 'functions.php';

if (isset($_POST['submit'])) {
	extract($_POST);

	for ($i = $s; $i <= $e; $i++) { 
		$urls[] = $link . 'chuong-' . $i . '/';
	}

	$content = single_curl($urls);
	preg_match_all('#<title>(.*?)</title>#is', $content, $tit);

	echo '<a style="background-color: yellow" href="get.php?link=' . $link . '&s=' . $s . '&e=' . $e . '">
		ok.php?link=' . $link . '&s=' . $s . '&e=' . $e . '
	</a>';
	foreach ($tit[1] as $key => $value) {
		echo "<pre>$key => $value</pre>";
	}
}

?>
<form method="post">
	<input type="text" name="link" placeholder="link" value="<?php echo $_POST['link'] ?>"><br>
	<input type="text" name="s" placeholder="s" value="<?php echo $_POST['s'] ?>"><br>
	<input type="text" name="e" placeholder="e" value="<?php echo $_POST['e'] ?>"><br>
	<input type="submit" name="submit" value="GET">
</form>
