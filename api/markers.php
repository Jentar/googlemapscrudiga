<?php
require "../database.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if($id){
	$markers = $db->query("SELECT * FROM markers WHERE id=$id;")->fetchAll(PDO::FETCH_OBJ);
}else{
	$markers = $db->query("SELECT * FROM markers;")->fetchAll(PDO::FETCH_OBJ);
}

exit(json_encode($markers));
