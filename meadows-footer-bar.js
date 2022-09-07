if (document.querySelector('#divchatmain')) {
    let chatWindow = document.querySelector('#divchatmain')
    let chatToggle = document.querySelector('#footer-live-chat')
    
    chatWindow.addEventListener('click',function(){
        chatToggle.classList.toggle('chat-closed')
    })
}