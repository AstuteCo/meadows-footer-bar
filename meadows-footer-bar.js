if (document.querySelector('#footer-live-chat')) {
    let chatToggle = document.querySelector('#footer-live-chat')
    chatToggle.addEventListener('click',function(){
        let chatWindow = document.querySelector('#divchatmain iframe')
        console.log(chatWindow.ariaHidden)
        if (!chatWindow.ariaHidden) {
            chatToggle.classList.remove('chat-closed')
        } else {
            chatToggle.classList.add('chat-closed')
        }
        console.log(chatToggle.classList)
    })
}