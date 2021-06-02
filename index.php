<?php
require "./database.php";

$page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRING);
$page = ($page ? $page : "markers") . ".php";
if (!file_exists($page)) $page = "markers.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body style="background-color: #333; color: #ccc; width: 300px; margin: 0; width: 100vw;">
	<nav style="padding: 0 1rem 0 1rem; display: flex; gap: 0.5rem;">
		<a style="color: white; text-decoration: none; padding: 0.5rem 0.5rem;" href="?page=markers">markers</a>
		<a style="color: white; text-decoration: none; padding: 0.5rem 0.5rem;" href="?page=map">map</a>
		<a style="color: white; text-decoration: none; padding: 0.5rem 0.5rem;" href="?page=new">add new markers</a>
	</nav>
	<?php require $page; ?>
</body>
</html>
