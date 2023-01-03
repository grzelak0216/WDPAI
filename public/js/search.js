const searchStart1 = document.querySelector("#map-start-city-alt")
const searchStart2 = document.querySelector("#map-start-city-long")
const searchEnd1 = document.querySelector("#map-end-city-alt")
const searchEnd2 = document.querySelector("#map-end-city-long")
const searchExtra = document.querySelector("#extrar")
const projectController = document.querySelector(".couriers-travels")
const serpopupContainer = document.querySelector('.popup');
const serbgContainer = document.querySelector('.t2');
const serpopupButton = document.getElementById('searcherbt');

serpopupButton.addEventListener('click', function(event) {
    event.preventDefault();

    const data = "Analizator zbierznosci tras";

    fetch("/search", {
        method: "POST",
        headers: {
            'Content-type': 'application/json'
        },
        body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (projects) {
            projectController.innerHTML = "";
            loadCourierNotices(projects)
        });

    serpopupContainer.classList.toggle('visable');
    serbgContainer.classList.toggle('blur');
})

let map = 0

function loadCourierNotices(couriers) {
    
    console.log(couriers)
    couriers.forEach(courier => {
        // if (routeAnalise(courier)) {
        //     console.log(courier)
        //     createCourier(courier);
        // }

        waitfor(courier);
    });
}

async function waitfor(courier) {
    const param = await routeAnalise(courier)
    if (param) {
        createCourier(courier);
    }
}

async function routeAnalise(courier) {
    const pointB = [searchStart1.value, searchStart2.value];
    const pointC = [searchEnd1.value, searchEnd2.value];
    const pointA = [courier.start_alt, courier.start_long];
    const pointD = [courier.end_alt, courier.end_long];

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

    console.log(routeDistance - josn4.routes[0].distance)
    console.log(courier.extra_road * 1000)

    const result = await ( routeDistance - josn4.routes[0].distance < courier.extra_road * 1000)
    
    console.log(result)

    return result
}

const container = document.querySelector('#couriers-travels')

function createCourier(courier){
    
    const template = document.querySelector('#courier-template');
    const clonedTemplate = template.content.cloneNode(true);

    const divCourierSingle = clonedTemplate.querySelector('.courier-single');
    divCourierSingle.id = "courier-single-" + map;

    divCourierSingle.dataset.startAlt = courier.start_alt;
    divCourierSingle.dataset.startLong = courier.start_long;
    divCourierSingle.dataset.endAlt = courier.end_alt;
    divCourierSingle.dataset.endLong = courier.end_long;


    const childOfDivHigher = divCourierSingle.firstElementChild;
    childOfDivHigher.id = "map-" + map;

    const courierfa1 = clonedTemplate.querySelector('#facity1');
    courierfa1.textContent += courier.start_name;
    const courierfa2 = clonedTemplate.querySelector('#facity2');
    courierfa2.textContent += courier.end_name;
    const courierfa3 = clonedTemplate.querySelector('#facity3');
    courierfa3.textContent += courier.date;
    const courierfa4 = clonedTemplate.querySelector('#facity4');
    courierfa4.textContent += courier.max_size + " cm";
    const courierfa5 = clonedTemplate.querySelector('#facity5');
    courierfa5.textContent += courier.extra_road + " +km";
    const courierfa6 = clonedTemplate.querySelector('#facity6');
    courierfa6.textContent += courier.car_brand + courier.car_model + courier.car_year;

    const link = clonedTemplate.querySelector('#template-link');
    link.href = "http://localhost:8080/info_courier_notice?hidden=" + courier.ID_courier_notices;

    map +=1
    container.appendChild(clonedTemplate);
}
