const addButtons = document.querySelectorAll(".addCourierButton, .addTransportButton");
const tmp = document.querySelector(".addTransportButton");


function NoticeToUser() {
    const notification = this;
    const container = notification.parentElement;
    const id = container.getAttribute("id");

    if(tmp != null) {
        fetch(`/addTransportNoticeToUser/${id}`).then(function () {
        }).then(function (response) {
            console.log(id);
        });
    } else {
        fetch(`/addCourierNoticeToUser/${id}`).then(function () {
        }).then(function (response) {
            console.log(id);
        });
    }
    window.location.href = 'http://localhost:8080/profile_notice'
}

addButtons.forEach(button => button.addEventListener("click", NoticeToUser));