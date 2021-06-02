let map;
let markers = [];

function initMap() {
	fetch("./api/markers.php")
		.then((res) => res.json())
		.then((data) => {
			let center;
			if (data[0]) {
				center = new google.maps.LatLng(
					data[0]?.latitude,
					data[0]?.longitude
				);
			} else {
				center = { lat: 58.255, lng: 22.4919 };
			}

			map = createMap(center);

			for (let marker of data) {
				markers.push(
					new google.maps.Marker({
						position: new google.maps.LatLng(
							marker.latitude,
							marker.longitude
						),
						map: map,
					})
				);
			}
		});
}

function createMap(center) {
	let map = new google.maps.Map(document.getElementById("map"), {
		center,
		zoom: 16,
	});

	let drawingManager = new google.maps.drawing.DrawingManager();
	drawingManager.setMap(map);
	google.maps.event.addListener(
		drawingManager,
		"markercomplete",
		function (marker) {
			fetch("api/saveMarker.php", {
				method: "POST",
				body: JSON.stringify({
					name: prompt("name"),
					pos: marker.getPosition().toJSON(),
				}),
			});
		}
	);

	return map;
}
