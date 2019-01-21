<?php

if (isset($_POST['submit'])) {
	extract($_POST);

	$info = array('link' => $link, 's' => $s, 'e' => $e);
	file_put_contents( "info.txt", json_encode($info) );
}

$infos = json_decode(file_get_contents("info.txt"), true);

?>
<form method="post">
	<input type="text" name="link" placeholder="link" value="<?php echo (isset($_POST['link'])) ? $_POST['link'] : $infos['link'] ?>"><br>
	<input type="text" name="s" placeholder="s" value="<?php echo (isset($_POST['s'])) ? $_POST['s'] : $infos['s'] ?>"><br>
	<input type="text" name="e" placeholder="e" value="<?php echo (isset($_POST['e'])) ? $_POST['e'] : $infos['e'] ?>"><br>
	<input type="submit" name="submit" value="GET">
</form>
<p><?php echo file_get_contents("data.txt"); ?></p>
