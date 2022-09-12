if (document.querySelector('#footer-live-chat')) {
    let chatToggle = document.querySelector('#footer-live-chat')
    chatToggle.addEventListener('click',function(){
        if (window.innerWidth > 703) {
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
        }
    })

    let labels = document.querySelectorAll('.footer-bar-item div')
    labels.forEach(function(each){
        let labelText = each.textContent
        let closestLink = each.closest('a')
        closestLink.id = `footer-bar-${labelText.toLowerCase().replace(' ','-')}`
        console.log(closestLink.id)
    })
}

if (window.innerWidth > 600) { 
    let textLinks = document.querySelectorAll('a[href^="sms:"]')
    textLinks.forEach(function(each){ 
        each.style.display = 'none' 
    })
 }