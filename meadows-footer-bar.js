if (document.querySelector('#footer-live-chat')) {
    let chatToggle = document.querySelector('#footer-live-chat')
    chatToggle.addEventListener('click',function(){
        // if (window.innerWidth > 703) {
        //     chatToggle.classList.toggle('chat-closed')
        // }
        let chatWindow = document.querySelector('#divchatmain')
        let chatWindowVisible = chatWindow.style.display
        if (chatWindowVisible === 'none') {
            console.log('chat closed')
            chatToggle.classList.add('chat-closed')
        } else {
            console.log('chat opened')
            chatToggle.classList.remove('chat-closed')
        }
        console.log(chatToggle.classList)
    })
}