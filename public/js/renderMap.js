const createMapOfTravels = () => {
    const couriersTravelsElements = document.querySelectorAll('#couriers-travels .courier-single');

    couriersTravelsElements.forEach((element, idx) => {
        const start = [element.getAttribute('data-start-alt'), element.getAttribute('data-start-long')]
        const end = [element.getAttribute('data-end-alt'), element.getAttribute('data-end-long')]

        renderMapWithGeocoder('map-' + idx, null, start, end);
    });
}


async function getRoute(map, start, end) {
    const query = await fetch(
        `https://api.mapbox.com/directions/v5/mapbox/cycling/${start[1]},${start[0]};${end[1]},${end[0]}?steps=true&geometries=geojson&access_token=${mapboxgl.accessToken}`,
        { method: 'GET' }
    );
    const json = await query.json();

    console.log(start)

    if (json.message) {
        console.error('ERROR for ' + start[0] + ',' + start[1] + ' ' + json.message);
        return;
    }
    

    const data = json.routes[0];
    const route = data.geometry.coordinates;
    const geojson = {
        type: 'Feature',
        properties: {},
        geometry: {
            type: 'LineString',
            coordinates: route
        }
    };

    

    // if the route already exists on the map, we'll reset it using setData
    if (map.getSource('route')) {
        map.getSource('route').setData(geojson);
    } else {// otherwise, we'll make a new request
        map.addLayer({
            id: 'route',
            type: 'line',
            source: {
                type: 'geojson',
                data: geojson
            },
            layout: {
                'line-join': 'round',
                'line-cap': 'round'
            },
            paint: {
                'line-color': 'red',
                'line-width': 6,
                'line-opacity': 1
            }
        });
    }
    // add turn instructions here at the end
}

const renderMapWithGeocoder = (mapId, addControl = false, startPoint, endPoint) => {
    mapboxgl.accessToken = 'pk.eyJ1IjoibG9jemVrMDIxIiwiYSI6ImNreXJuZHlyYTB2OW4ybnA2OG13bjl3aWUifQ.GTlRYWJeD0yMlpnknkwkdA';
    // Jeśli element z podanym id nie istnieje to przerwij działanie skryptu
    const mapElement = document.getElementById(mapId);
    if (!mapElement) return;

    const center = [
        startPoint && startPoint[1] || 19.939,
        startPoint && startPoint[0] || 50.052
    ]

    // obiekt mapy zgodny z dokumentacją
    const mapBoxGl = new mapboxgl.Map({
        container: mapId, // container id
        style: 'mapbox://styles/mapbox/streets-v9', //hosted style id
        center,
        zoom: 12, // starting zoom
        minZoom: 5 // keep it local
    });

    if (addControl) {
        const mapBoxGlGeocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        });
        mapBoxGl.addControl(mapBoxGlGeocoder); //deklaracja input dla wyszukiwarki
        mapBoxGl.on('load', function() {
            mapBoxGlGeocoder.on('result', function(ev) {
                //zapisz dane do formularza
                const cityName = ev.result.place_name;
                const cityLong = ev.result.center[0];
                const cityLat = ev.result.center[1];

                document.getElementById(mapId + "-name").value = cityName;
                document.getElementById(mapId + '-long').value = cityLong;
                document.getElementById(mapId + '-alt').value = cityLat;
            });
        });
    }

    mapBoxGl.on('load', () => {
        if (startPoint) {
            mapBoxGl.addLayer({
                id: 'point-1',
                type: 'circle',
                source: {
                type: 'geojson',
                data: {
                    type: 'FeatureCollection',
                    features: [{
                        type: 'Feature',
                        properties: {},
                        geometry: {
                            type: 'Point',
                            coordinates: [parseFloat(startPoint[1]), parseFloat(startPoint[0])]
                        }
                    }]
                }
                },
                paint: {
                'circle-radius': 20,
                'circle-color': 'red'
                }
            });
        }

        if (endPoint) {
            mapBoxGl.addLayer({
                id: 'point-2',
                type: 'circle',
                source: {
                type: 'geojson',
                data: {
                    type: 'FeatureCollection',
                    features: [{
                        type: 'Feature',
                        properties: {},
                        geometry: {
                            type: 'Point',
                            coordinates: [parseFloat(endPoint[1]), parseFloat(endPoint[0])]
                        }
                    }]
                }
                },
                paint: {
                'circle-radius': 20,
                'circle-color': 'red'
                }
            });
        }

        if (startPoint && endPoint) {
            getRoute(mapBoxGl, startPoint, endPoint)
        }
    });
}

const renderMapOnAddCourierNotice = () => {
    renderMapWithGeocoder('map-start-city', true);
    renderMapWithGeocoder('map-end-city', true);
}

async function getDistance () {
    pointA = ['49.5493865', '21.850839']
    pointB = ['50.052', '19.939']
    pointC = ['50.066', '19.95']
    pointD = ['50.06667', '19.95']

    const before = await fetch(
        `https://api.mapbox.com/directions/v5/mapbox/cycling/${pointA[1]},${pointA[0]};${pointB[1]},${pointB[0]}?steps=true&geometries=geojson&access_token=${mapboxgl.accessToken}`,
        { method: 'GET' }
    );
    const json1 = await before.json();

    const packageRoute = await fetch(
        `https://api.mapbox.com/directions/v5/mapbox/cycling/${pointB[1]},${pointB[0]};${pointC[1]},${pointC[0]}?steps=true&geometries=geojson&access_token=${mapboxgl.accessToken}`,
        { method: 'GET' }
    );
    const json2 = await packageRoute.json();

    const after = await fetch(
        `https://api.mapbox.com/directions/v5/mapbox/cycling/${pointC[1]},${pointC[0]};${pointD[1]},${pointD[0]}?steps=true&geometries=geojson&access_token=${mapboxgl.accessToken}`,
        { method: 'GET' }
    );
    const json3 = await after.json();

    const baseRoute = await fetch(
        `https://api.mapbox.com/directions/v5/mapbox/cycling/${pointA[1]},${pointA[0]};${pointD[1]},${pointD[0]}?steps=true&geometries=geojson&access_token=${mapboxgl.accessToken}`,
        { method: 'GET' }
    );
    const josn4 = await baseRoute.json();

    const routeDistance = json1.routes[0].distance  + json2.routes[0].distance + json3.routes[0].distance;
    
    console.log(routeDistance)    
    console.log(josn4.routes[0].distance)    
}