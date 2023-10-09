function fetchMessages() {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", 'fetch_messages.php?tid='+ tid, true);
    xhr.onload = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let response = xhr.responseText;
                let chatBox = document.querySelector('.chat-box');
                chatBox.innerHTML = response;

              
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        }
    };
    xhr.send();
}


fetchMessages();

setInterval(fetchMessages, 5000);