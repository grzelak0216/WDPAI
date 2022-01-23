const search1 = document.querySelector('input[placeholder="Miasto poczatkowe"]');
const search2 = document.querySelector('input[placeholder="Miasto koncowe"]');
const transportContainer = document.querySelector(".orders1");
const courierContainer = document.querySelector(".orders2");


search2.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search1: search1.value, search2: search2.value};

        if (transportContainer != null){

            fetch("/search", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }).then(function (response) {
                return response.json();
            }).then(function (items) {
                transportContainer.innerHTML = "";
                loadTransportNotices(items)
            });

        } else {

            fetch("/search", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }).then(function (response) {
                return response.json();
            }).then(function (couriers) {
                courierContainer.innerHTML = "";
                loadCourierNotices(couriers)
            });

        }
    }
});

search1.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search1: search1.value, search2: search2.value};

        if (transportContainer != null){

            fetch("/search", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }).then(function (response) {
                return response.json();
            }).then(function (items) {
                transportContainer.innerHTML = "";
                loadTransportNotices(items)
            });

        } else {

            fetch("/search", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }).then(function (response) {
                return response.json();
            }).then(function (couriers) {
                courierContainer.innerHTML = "";
                loadCourierNotices(couriers)
            });

        }
    }
});

function loadTransportNotices(items) {
    items.forEach(item => {
        createTransportNotice(item);
    });
}

function loadCourierNotices(couriers) {
    couriers.forEach(courier => {
        createCourierNotice(courier);
    });
}

function createTransportNotice(item) {
    const template = document.querySelector("#transport_notice-template");
    const clone = template.content.cloneNode(true);
    const div = clone.querySelector("div");
    div.id = item.ID_transport_notice;
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${item.image}`;
    const startCity = clone.querySelector(".startCity");
    const endCity = clone.querySelector(".endCity");
    const type = clone.querySelector(".type");
    const payment = clone.querySelector(".payment");

    startCity.textContent += item.start_city;
    endCity.textContent += item.end_city;
    type.textContent += item.type;
    payment.textContent += item.payment;

    transportContainer.appendChild(clone);
}

function createCourierNotice(courier) {
    const template = document.querySelector("#courier_notice-template");
    const clone = template.content.cloneNode(true);
    const div = clone.querySelector("div");
    div.id = courier.ID_courier_notice;

    const startCity = clone.querySelector(".startCity");
    const endCity = clone.querySelector(".endCity");

    const date = clone.querySelector(".date");
    const extra_route = clone.querySelector(".extra_route");
    const max_size = clone.querySelector(".max_size");
    const brand = clone.querySelector(".brand");
    const model = clone.querySelector(".model");
    const year = clone.querySelector(".year");

    startCity.textContent += courier.start_city;
    endCity.textContent += courier.end_city;
    date.textContent += courier.date;
    extra_route.textContent += courier.extra_route;
    max_size.textContent += courier.max_size;
    brand.textContent += courier.car_brand;
    model.textContent += courier.car_model;
    year.textContent += courier.car_year;

    courierContainer.appendChild(clone);
}
