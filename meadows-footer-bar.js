if (document.querySelector('#footer-live-chat')) {
    let chatToggle = document.querySelector('#footer-live-chat')
    chatToggle.addEventListener('click',function(){
        // if (window.innerWidth > 703) {
        //     chatToggle.classList.toggle('chat-closed')
        // }
        let chatWindow = document.querySelector('#divchatmain iframe')
        console.log(chatWindow.ariaHidden)
        if (chatWindow.ariaHidden) {
            console.log('chat closed')
            let chatToggle = document.querySelector('#footer-live-chat')
            chatToggle.classList.add('chat-closed')
        } else {
            console.log('chat opened')
            let chatToggle = document.querySelector('#footer-live-chat')
            chatToggle.classList.remove('chat-closed')
        }
        console.log(chatToggle.classList)
    })
}