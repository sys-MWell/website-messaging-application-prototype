const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

// Discussion class
class Discussion
{
    UniqueChatId;
    UniqueUserId;
    MessageInput;

    constructor(uniquechatid, uniqueuserid, messageinput)
    {
        this.UniqueChatId = uniquechatid;
        this.UniqueUserId = uniqueuserid;
        this.MessageInput = messageinput;
    }

    getDiscussionChatId()
    {
        return this.UniqueChatId;
    }

    getDiscussionsUserId()
    {
        return this.UniqueUserId;
    }

    getDiscussionMessageInput()
    {
        return this.MessageInput;
    }
}

form.onsubmit = (e)=>{
    e.preventDefault(); // Preventsing form from submitting
}

sendBtn.onclick = ()=>{
    // Start Ajex
    let xhr = new XMLHttpRequest(); // Creating XML object
    xhr.open("POST", "php/insert_discussion_chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                sendResponse = new Discussion(null, formData, inputField)
                inputField.value = ""; // When message sends, input box is cleared
                $("#myTextarea").data("emojioneArea").setText('');
                scrollToBottom();
            }
        }
    }
    // We have to send the form data through ajax to php
    let formData = new FormData(form); // New formData object
    xhr.send(formData); // Send form data to php
}

// If mouse in use scroll is active
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}
// Else
chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(()=>{
    // Start Ajex
    let xhr = new XMLHttpRequest(); // Creating XML object
    // Get available discussions
    xhr.open("POST", "php/get_discussion_chat.php", true);
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
    let formData = new FormData(form);
    xhr.send(formData);
}, 500); // Function run every 500ms

// Function to automatically scroll
function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}