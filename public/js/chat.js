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
                option.value = user.id;
                option.text = user.username;
                // Append option to select element
                recipientSelect.appendChild(option);
            });
        });
});

// Handle form submission
messageForm.addEventListener('submit', e => {
    e.preventDefault();

    // Get recipient and message values
    const recipientId = recipientSelect.value;
    const message = messageInput.value;

    // Send POST request to server to send message
    fetch('./public/api/send-message.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `recipient_id=${recipientId}&message=${message}`
    });

    // Clear message input
    messageInput.value = '';
});

// Handle incoming messages
const socket = new WebSocket('ws://localhost:8080');

socket.addEventListener('message', e => {
    // Parse message
    const message = JSON.parse(e.data);

    // Create message element
    const messageElement = document.createElement('div');
    messageElement.innerHTML = `<strong>${message.sender}:</strong> ${message.message}`;

    // Append message to messages element
    messages.appendChild(messageElement);
});