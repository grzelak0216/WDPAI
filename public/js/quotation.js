const calculateButton = document.querySelector('.calculate-button');
const outputResult = document.querySelector('.output-result');
calculateButton.addEventListener('click', () => {
    const widthInput = document.querySelector('input[name="width"]').value;
    const heightInput = document.querySelector('input[name="height"]').value;
    const depthInput = document.querySelector('input[name="depth"]').value;
    const lengthInput = document.querySelector('input[name="route"]').value;

    const result = +widthInput + +heightInput + +depthInput + +lengthInput;

    outputResult.innerHTML = result;
})

//logika do pokazywania i ukrywania bars
const optionContainer = document.querySelector('.option-container');
const burgerButton = document.getElementById('burger');

burgerButton.addEventListener('click', () => {
    optionContainer.classList.toggle('active');
})
