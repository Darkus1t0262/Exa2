const messagesDiv = document.getElementById('messages');
const chatForm = document.getElementById('chat-form');
const messageInput = document.getElementById('message-input');

chatForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const message = messageInput.value;

    // Append to chat (optimistically)
    const messageElement = document.createElement('div');
    messageElement.textContent = `You: ${message}`;
    messagesDiv.appendChild(messageElement);

    // Send message to backend
    try {
        const response = await fetch('backend.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ message }),
        });
        const data = await response.json();

        const replyElement = document.createElement('div');
        replyElement.textContent = `Server: ${data.reply}`;
        messagesDiv.appendChild(replyElement);
    } catch (error) {
        console.error('Error:', error);
    }

    messageInput.value = '';
});

