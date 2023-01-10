// Get DOM elements
const messageForm = document.getElementById('message-form');
const messageInput = document.getElementById('message-input');
const recipientSelect = document.getElementById('recipient-select');
const messages = document.getElementById('messages');

// Load options for recipient selection dropdown
window.addEventListener('load', () => {
    fetch('./public/api/users.php')
        .then(response => response.json())
        .then(users => {
            // Loop through users
            users.forEach(user => {
                // Create option element
                const option = document.createElement('option');
                option.value = user.ID_user;
                option.text = user.email;
                // Append option to select element
                recipientSelect.appendChild(option);
            });
        });
});

// Handle form submission
messageForm.addEventListener('submit', e => {
    e.preventDefault();

    // Get recipient and message values
    const osoba_b = recipientSelect.value;
    const message = messageInput.value;

    if (!message) {
        return
    }

    // Send POST request to server to send message
    //TODOD Sciezka do metody kontrolera
    fetch('/sendMessage', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({osoba_b: osoba_b, message:message})
    });

    messageInput.value = '';
    loadMessages()
});

setInterval(loadMessages, 10*1000);

function loadMessages(){
    const osoba_b = recipientSelect.value;

    fetch('/getMessages', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({osoba_b:osoba_b})
    }).then(response =>{
        messages.innerHTML = '';
        return response.json();
    }).then(function(messages){
        createMessages(messages);
    }).then(() => {
        messages.scrollTo(0, messages.scrollHeight);
    })
}

function createMessages(messages){
    const sender = getCookie("userID")
    if(!messages) return;
    messages.forEach(messsage =>{
        createMessage(messsage, sender);
    })
}

function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
}

function createMessage(message, sender){
    // Create message element
    const messageElement = document.createElement('div');

    if (sender == message.sender_id) messageElement.classList.add("sender");
    messageElement.innerHTML = `<span>${message.message}</span></br> <p>${message.timestamp.slice(0, 19)}</p>`;

    // Append message to messages element
    messages.appendChild(messageElement);
}