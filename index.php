<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Get ts.tv & tcv</title>
<form action="multi.php" method="get">
	<input type="text" name="link" placeholder="link"><br>
	<input type="number" name="s" placeholder="s"><br>
	<input type="number" name="e" placeholder="e"><br>
	<input type="submit" value="GET">
</form>
<p><?php echo file_get_contents("data.txt"); ?></p>
<code><a href="info.php">phpinfo</a></code> | <code><a href="tcv.php">tcv</a></code>
