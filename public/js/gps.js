mapboxgl.accessToken = 'pk.eyJ1IjoibG9jemVrMDIxIiwiYSI6ImNreXJuZHlyYTB2OW4ybnA2OG13bjl3aWUifQ.GTlRYWJeD0yMlpnknkwkdA';

var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/streets-v9', //hosted style id
    center: [19.56, 50.04], // starting position
    zoom: 5, // starting zoom
    minZoom: 5 // keep it local
});

var geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    // limit results to Australia
    //country: 'POLAND',
});

// After the map style has loaded on the page, add a source layer and default
// styling for a single point.
map.on('load', function() {
    // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
    // makes a selection and add a symbol that matches the result.
    geocoder.on('result', function(ev) {
        console.log(ev.result.center);

    });
});

fetch("/places", {
    method: "GET"
}).then(function (response) {
    return response.json();
}).then(function(places) {
    places.map(place => {
        place.coordinates = JSON.parse(place.coordinates).point
    });
    console.log(places)
    placeMarkers(places);
});

function placeMarkers(places) {
    for (const feature of places) {
        // create a HTML element for each feature
        const el = document.createElement('div');
        el.className = 'marker';

        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el)
            .setLngLat(feature.coordinates)
            .addTo(map);


    }
}

var draw = new MapboxDraw({
    displayControlsDefault: false,
    controls: {
        line_string: true,
        trash: true
    },
    styles: [
        // ACTIVE (being drawn)
        // line stroke
        {
            "id": "gl-draw-line",
            "type": "line",
            "filter": ["all", ["==", "$type", "LineString"], ["!=", "mode", "static"]],
            "layout": {
                "line-cap": "round",
                "line-join": "round"
            },
            "paint": {
                "line-color": "#3b9ddd",
                "line-dasharray": [0.2, 2],
                "line-width": 4,
                "line-opacity": 0.7
            }
        },
        // vertex point halos
        {
            "id": "gl-draw-polygon-and-line-vertex-halo-active",
            "type": "circle",
            "filter": ["all", ["==", "meta", "vertex"], ["==", "$type", "Point"], ["!=", "mode", "static"]],
            "paint": {
                "circle-radius": 10,
                "circle-color": "#FFF"
            }
        },
        // vertex points
        {
            "id": "gl-draw-polygon-and-line-vertex-active",
            "type": "circle",
            "filter": ["all", ["==", "meta", "vertex"], ["==", "$type", "Point"], ["!=", "mode", "static"]],
            "paint": {
                "circle-radius": 6,
                "circle-color": "#3b9ddd",
            }
        },
    ]
});
// add the draw tool to the map
map.addControl(draw); //////////////////////////

// add create, update, or delete actions
map.on('draw.create', updateRoute);
map.on('draw.update', updateRoute);
map.on('draw.delete', removeRoute);

// use the coordinates you just drew to make your directions request
function updateRoute() {
    removeRoute(); // overwrite any existing layers
    var data = draw.getAll();
    console.log(data);
    console.log(draw);
    var lastFeature = data.features.length - 1;
    var coords = data.features[lastFeature].geometry.coordinates;
    var newCoords = coords.join(';');
    getMatch(newCoords);
}

// make a directions request
function getMatch(e) {
    var url = 'https://api.mapbox.com/directions/v5/mapbox/driving/' + e
        +'?geometries=geojson&steps=true&access_token=' + mapboxgl.accessToken;
    var req = new XMLHttpRequest();
    req.responseType = 'json';
    req.open('GET', url, true);
    req.onload  = function() {
        var jsonResponse = req.response;
        var distance = jsonResponse.routes[0].distance*0.001;
        var duration = jsonResponse.routes[0].duration/60;
        var steps = jsonResponse.routes[0].legs[0].steps;
        var coords = jsonResponse.routes[0].geometry;
        //  console.log(steps);
        console.log(coords);
        //  console.log(distance);
        // console.log(duration);

        // get route directions on load map

        // get distance and duration
        //instructions.insertAdjacentHTML('beforeend', '<p>' +  'Distance: ' + distance.toFixed(2) + ' km<br>Duration: ' + duration.toFixed(2) + ' minutes' + '</p>');

        // add the route to the map
        addRoute(coords);
        //  console.log(coordinates);

    };
    req.send();
}

// adds the route as a layer on the map
function addRoute (coords) {
    // check if the route is already loaded
    if (map.getSource('route')) {
        map.removeLayer('route');
        map.removeSource('route')
    } else{
        map.addLayer({
            "id": "route",
            "type": "line",
            "source": {
                "type": "geojson",
                "data": {
                    "type": "Feature",
                    "properties": {},
                    "geometry": coords
                }
            },
            "layout": {
                "line-join": "round",
                "line-cap": "round"
            },
            "paint": {
                "line-color": "#1db7dd",
                "line-width": 8,
                "line-opacity": 0.8
            }
        });
    };
}

// remove the layer if it exists
function removeRoute () {
    if (map.getSource('route')) {
        map.removeLayer('route');
        map.removeSource('route');
    } else  {
        return;
    }
}
document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

