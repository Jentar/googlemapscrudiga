<?php
require "./database.php";

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

if(empty($id)) exit("no id given");

$stmt = $db->prepare(" DELETE FROM markers WHERE id=?");
$stmt->execute([$id]);

header("Location: ./");

?>
