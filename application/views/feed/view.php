<html>
	<head>
		<title>Feed Parser Test</title>
	</head>
	<body>
		<b>CodeIgniter Feed</b>
		<ul>
<?php
foreach ($items as $item) {
	echo "\t\t\t<li><a href='" . $item->get_link() . "'>" . $item->get_title() . "</a></li>\n";
}
?>
		</ul>
	</body>
</html>
