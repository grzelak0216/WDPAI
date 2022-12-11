const searchStart1 = document.querySelector('input[placeholder="START ALT"]')
const searchStart2 = document.querySelector('input[placeholder="START LONG"]')
const searchEnd1 = document.querySelector('input[placeholder="END ALT"]')
const searchEnd2 = document.querySelector('input[placeholder="END LONG"]')
const searchExtra = document.querySelector('input[placeholder="Dodatkowa trasa"]')
const projectController = document.querySelector(".couriers-travels")
const popupContainer = document.querySelector('.popup');
const bgContainer = document.querySelector('.t2');
const popupButton = document.getElementById('searcherbt');

popupButton.addEventListener('click', function(event) {
    event.preventDefault();

    const dataStart1 = {searchStart1: this.value};
    const dataStart2 = {searchStart2: this.value};
    const dataEnd1 = {searchEnd1: this.value};
    const dataEnd2 = {searchEnd2: this.value};
    const dataExtra = {searchExtra: this.value};

    fetch("/search", {
        method: "POST",
        headers: {
            'Content-type': 'application/json'
        },
        body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (projects) {
            projectContainer.innerHTML = "";
            loadProjects(projects)
        });

    popupContainer.classList.toggle('visable');
    bgContainer.classList.toggle('blur');
})

function loadCourierNotices(couriers) {
    couriers.forEach(courier => {
        console.log(courier)
        createCourierNotice(courier);
    });
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
