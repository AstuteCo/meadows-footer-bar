console.log(document.querySelector('#divchatmain iframe'))
if (document.querySelector('#divchatmain iframe')) {
    let chatWindow = document.querySelector('#divchatmain iframe')
    let chatToggle = document.querySelector('#footer-live-chat')

    console.log(chatWindow)

    chatToggle.addEventListener('click',function(){
        console.log(chatWindow.ariaHidden)
        if (!chatWindow.ariaHidden) {
            chatToggle.classList.remove('chat-closed')
        } else {
            chatToggle.classList.add('chat-closed')
        }
        console.log(chatToggle.classList)
    })
}