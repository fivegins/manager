<?php

if (isset($_POST['submit'])) {
	extract($_POST);

	$info = array('link' => $link, 's' => $s, 'e' => $e);
	file_put_contents( "info.txt", json_encode($info) );
}

?>
<form method="post">
	<input type="text" name="link" placeholder="link" value="<?php echo $_POST['link'] ?>"><br>
	<input type="text" name="s" placeholder="s" value="<?php echo $_POST['s'] ?>"><br>
	<input type="text" name="e" placeholder="e" value="<?php echo $_POST['e'] ?>"><br>
	<input type="submit" name="submit" value="GET">
</form>
<p><?php echo file_get_contents("data.txt"); ?></p>
