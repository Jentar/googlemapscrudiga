<?php
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if($id){
	$markers = $db->query("SELECT * FROM markers WHERE id=$id;")->fetchAll(PDO::FETCH_OBJ);
}else{
	$markers = $db->query("SELECT * FROM markers;")->fetchAll(PDO::FETCH_OBJ);
}
?>
<div style="margin: 1rem;">
	<h1>Marker List</h1>
	<?php foreach ($markers as $marker): ?>
		<div style="display: grid; grid-template-columns: 150px auto; margin-bottom: 1rem; position: relative; width: 500px">
			<span>Name: </span><span><?= $marker->name?></span>
			<span>Latitude: </span><span><?= $marker->latitude?></span>
			<span>Longitude: </span><span><?= $marker->longitude?></span>
			<span>Description: </span><span><?= $marker->description?></span>

			<form style="position:absolute; right: 0;" action="delete.php" method="POST">
				<button name="id" value="<?= $marker->id ?>">X</button>
			</form>
		</div>
	<?php endforeach ?>
</div>
