function initCrijMap(points){

		map = displayMap();

		displayMarkers(map, points);
	}


	function displayMarkers(map, points){
		for(key in points){

			point = points[key];

			// ajouter un marqueur à l'emplacement donné

			options = {
				icon:  L.icon({
					  iconUrl: point.icon
					, iconSize: [25, 25]
					, iconAnchor: [-3, 0]
					, popupAnchor: [15, 0]
				})
			};

			L.marker(point.coord, options).addTo(map)
			    .bindPopup(point.name +'<a href="'+ point.href +'">Accéder à mon espace</a>');
			}
	}


	function displayMap(){
		// create a map in the "map" div, set the view to a given place and zoom
		var map = L.map('map-ij').setView([43.6316, 3.89706], 11);

		// add an OpenStreetMap tile layer
		L.tileLayer('http://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
		    attribution: '© <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);


		var popup = L.popup();

		function onMapClick(e) {
		    popup
		        .setLatLng(e.latlng)
		        .setContent("Coordonnées : " + e.latlng.toString())
		        .openOn(map);
		}

		map.on('click', onMapClick);




		return map;
	}