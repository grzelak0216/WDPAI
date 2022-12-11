//logika do pokazywania i ukrywania bars
const optionContainer = document.querySelector('.option-container');
const burgerButton = document.getElementById('burger');

burgerButton.addEventListener('click', () => {
    optionContainer.classList.toggle('active_nav');
})

const popupContainer = document.querySelector('.popup');
const bgContainer = document.querySelector('.t2');
const popupButton = document.getElementById('popupbt');


popupButton.addEventListener('click', () => {
    popupContainer.classList.toggle('visable');
    bgContainer.classList.toggle('blur');
})