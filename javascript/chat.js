const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault(); // preventsing form from submitting
}

sendBtn.onclick = ()=>{
    // let's start Ajex
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/insert_chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = ""; // When message sends, input box is cleared
                $("#myTextarea").data("emojioneArea").setText('');
                scrollToBottom();
            }
        }
    }
    // we have to send the form data through ajax to php
    let formData = new FormData(form); // new formData object
    xhr.send(formData); // send form data to php
}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(()=>{
    // let's start Ajex
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/get_chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;

                //Allow user to scroll up
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                }
            }
        }
    }
    let formData = new FormData(form); // new formData object
    xhr.send(formData); // send form data to php
}, 500); // function run every 500ms

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}