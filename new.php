<?php
require "database.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$marker = filter_input_array(INPUT_POST, [
		"name" => FILTER_SANITIZE_STRING,
		"latitude" => [
			"filter" => FILTER_SANITIZE_NUMBER_FLOAT,
			"flags" => FILTER_FLAG_ALLOW_FRACTION,
		],
		"longitude" => [
			"filter" => FILTER_SANITIZE_NUMBER_FLOAT,
			"flags" => FILTER_FLAG_ALLOW_FRACTION,
		],
		"description" => FILTER_SANITIZE_STRING,
	]);

	$stmt = $db->prepare("INSERT INTO markers (name, latitude, longitude, description) VALUES (:name, :latitude, :longitude, :description)");

	$stmt->bindParam("name", $marker["name"]);
	$stmt->bindParam("latitude", $marker["latitude"]);
	$stmt->bindParam("longitude", $marker["longitude"]);
	$stmt->bindParam("description", $marker["description"]);

	if($stmt->execute()){
		echo "success";
	}
}

?>
<!DOCTYPE html>
<html style="height: 100%" lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body >
	<form style="width: 500px; margin: auto; display: flex; flex-direction: column; gap: 1rem; background-color: #777; padding: 0 3rem 2rem 3rem;" action="" method="POST">
		<h1>Add new marker</h1>

		<input style="padding: 0.5rem 1rem;" placeholder="name" name="name" type="text" required>
		<div style="width: 100%; display: flex;">
			<input style="padding: 0.5rem 1rem; flex: 1 0;" placeholder="latitude"  name="latitude" type="number" step="any" required>
			<input style="padding: 0.5rem 1rem; flex: 1 0;" placeholder="longitude" name="longitude" type="number" step="any" required>
		</div>

		<textarea rows="10" style="resize: none;" placeholder="description" name="description" required></textarea>

		<button type="submit">Add new</button>
	</form>
</body>
</html>
