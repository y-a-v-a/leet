<?php
error_reporting (E_ALL|E_STRICT);

require_once '../share/Leet.class.php';

if (isset($_POST['leetstring'])) {
	$show = true;
	$leetstring = strip_tags($_POST['leetstring']);
	$leet = new Leet($leetstring);
} else {
	$show = false;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Leet demo</title>
<style>
body {
	width: 100%;
	height: 100%;
	padding: 0;
	margin: 0;
	font-family: Monaco, Courier;
	font-size: 10pt;
	letter-spacing: 0.05em;
}
textarea {
	font-family: Monaco, Courier;
	font-size: 11pt;
	letter-spacing: 0.05em;
	text-align: left;
	border: 1px solid rgb(192,192,192);
	background: #fef;
	line-height: 20pt;
}
div.palette {
	width: 1024px;
	height: 600px;
	border: 2px solid rgb(192,192,192);
	margin: 24px auto 0;
}
</style>
</head>
<body>
  <div class="palette">
	<div style="width: auto; padding: 12px; height: 500px;">
		<h2>1337 Demo</h2>
		<p>This is the Leet Class Demo. <q cite="http://en.wikipedia.org/wiki/Leet" title="From Wikipedia">Leet originated within bulletin board systems in the 1980s, where having "elite" status on a BBS allowed a user access to file folders, games, and special chat rooms. One theory is that it was developed to defeat text filters created by BBS or Internet Relay Chat system operators for message boards to discourage the discussion of forbidden topics, like cracking and hacking.</q> This class has nothing to do with the origins of leet; it just shows how you can easily transform a string to leet-like text.<br /><a href="http://www.vincentbruijn.nl">back</a></p>

  <form method="post" name="leetform" action="index.php" style="width: 900px; margin: 0 auto;">
	<?php if ($show == true): ?>
		<input type="hidden" name="leetstring" value="<?php echo $leetstring ?>">
		<textarea cols="90" rows="10"><?php echo trim($leet->converted); ?></textarea><br>
		<a href="index.php" target="_self">New</a> | <button type="submit">Same string again!</button>
	<?php else:?>
		<textarea name="leetstring" cols="90" rows="10"></textarea><br>
		<input type="submit" value="Leetify!">
	<?php endif; ?>
  </form>
	</div>
	<div style="width: auto; padding: 12px; margin-top:12px; clear: both; text-align: right">
		<address>Vincent Bruijn</address>
	</div>
  </div>
</body>
</html>
