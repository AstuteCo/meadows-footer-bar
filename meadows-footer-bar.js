if (document.querySelector('#divchatmain')) {
    let chatWindow = document.querySelector('#divchatmain')
    let chatToggle = document.querySelector('#footer-live-chat')
    
    chatToggle.addEventListener('click',function(){
        if (chatWindow.style.display === 'block') {
            chatToggle.classList.remove('chat-closed')
        } else {
            chatToggle.classList.add('chat-closed')
        }
    })
}