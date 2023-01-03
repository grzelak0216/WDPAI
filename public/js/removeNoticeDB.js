const rmButtons = document.querySelectorAll(".removeCourierButton, .removeTransportButton");
const tmp3 = document.querySelector(".removeTransportButton");


function removeNoticeFromDB() {
    const notification = this;
    const container = notification.parentElement;
    const id = container.getAttribute("id");

    console.log(tmp3);

    if(tmp3 != null) {
        fetch(`/removeTransportNotice/${id}`).then(function () {
        }).then(function (response) {
            console.log(id);
            window.location.href = 'http://localhost:8080/transport_notice'
        });
    } else {
        fetch(`/removeCourierNotice/${id}`).then(function () {
        }).then(function (response) {
            console.log(id);
            window.location.href = 'http://localhost:8080/transport_notice'
        });
    }

}

rmButtons.forEach(button => button.addEventListener("click", removeNoticeFromDB));