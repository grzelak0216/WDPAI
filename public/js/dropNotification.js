const dropButtons = document.querySelectorAll(".dropCourierButton, .dropTransportButton");
const tmp2 = document.querySelector(".dropTransportButton");


function dropNoticeFromUser() {
    const notification = this;
    const container = notification.parentElement;
    const id = container.getAttribute("id");

    console.log(tmp2);

    if(tmp2 != null) {
        fetch(`/dropTransportNoticeToUser/${id}`).then(function () {
        }).then(function (response) {
            console.log(id);
            window.location.reload();
        });
    } else {
        fetch(`/dropCourierNoticeToUser/${id}`).then(function () {
        }).then(function (response) {
            console.log(id);
            window.location.reload();
        });
    }

}

dropButtons.forEach(button => button.addEventListener("click", dropNoticeFromUser));