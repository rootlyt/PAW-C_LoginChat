const chat = document.querySelector('#chat');
const message = document.querySelector('#message');

const baseUrl = `http://localhost/pemweb/prototype`;

function readChat() {
    fetch(`${baseUrl}/chat-read.php`)
        .then(res => res.text())
        .then(res => {
            chat.value = res;
        });
    setTimeout(readChat, 1000);
};
readChat();
message.addEventListener('keyup', e => {
    if (e.keyCode === 13) {
        var form = new FormData()
        form.append("message", message.value)
        fetch(`${baseUrl}/chat-write.php`, {
            method: 'post',
            headers: {
                'Content.type': 'application/x-www-form-urlenconded',
            },
            body: form
        });
        message.value = '';
    }
});