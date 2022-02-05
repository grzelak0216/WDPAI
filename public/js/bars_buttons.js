//logika do pokazywania i ukrywania bars
const optionContainer = document.querySelector('.option-container');
const burgerButton = document.getElementById('burger');

burgerButton.addEventListener('click', () => {
    optionContainer.classList.toggle('active');
})

const optionSearch = document.querySelector('.option-search');
const searchButton = document.getElementById('search');

searchButton.addEventListener('click', () => {
    optionSearch.classList.toggle('active');
})

const optionAdd = document.querySelector('.option-add');
const addButton = document.getElementById('add');

addButton.addEventListener('click', () => {
    optionAdd.classList.toggle('active');
})