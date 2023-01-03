// Get DOM elements
const recipientForm = document.getElementById('recipient-form');
const recipientSelect = document.getElementById('recipient-select');

// Load options for recipient selection dropdown
window.addEventListener('load', () => {
    fetch('./public/api/users.php')
        .then(response => response.json())
        .then(users => {
            // Loop through users
            users.forEach(user => {
                // Create option element
                const option = document.createElement('option');
                console.log(user)
                option.value = user.ID_user;
                option.text = user.email;
                // Append option to select element
                recipientSelect.appendChild(option);
            });
        });
});

// Handle form submission
recipientForm.addEventListener('submit', e => {
    e.preventDefault();

    // Get recipient value
    const recipientId = recipientSelect.value;

    // Redirect to index.html with recipient ID as URL parameter
    window.location.href = `chat?hidden=${recipientId}`;
});