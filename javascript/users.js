const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
searchSwitch = document.getElementById('search-switch'),
usersList = document.querySelector(".users .users-list");

// When searchbar is clicked
searchBtn.onclick = ()=>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
}

// Private chat class
class PrivateChat
{
    constructor(messageid, incominguserid, outgoinguserid, messageinput)
    {
        this.MessageId = messageid;
        this.IncomingUserId = incominguserid;
        this.OutgoingUserId = outgoinguserid;
        this.MessageInput = messageinput;
    }

    getPrivateChatMessageId()
    {
        return this.MessageId;
    }

    getPrivateChatIncomingUserId()
    {
       return this.IncomingUserId;
    }
    
    getPrivateChatOutgoingUserId()
    {
        return this.OutgoingUserId;
    }

    getPrivateChatMessageInput()
    {
        return this.MessageInput;
    }
}

// UserTags class
class UserTags
{   
    TagId;
    UniqueUserId;
    Tags;

    constructor(tagid, uniqueuserid, tags)
    {
        this.TagId = tagid;
        this.UniqueUserId = uniqueuserid;
        this.Tags = tags;
    }

    getDiscussionChatId()
    {
        return this.TagId;
    }

    getDiscussionsUserId()
    {
        return this.UniqueUserId;
    }

    getDiscussionMessageInput()
    {
        return this.Tags;
    } 
}

// When searchbar is used (user presses any key)
searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active"); 
    }else{
        searchBar.classList.remove("active");
    }

    // Start ajax
    let xhr = new XMLHttpRequest();
    if (searchSwitch.checked){  
        // If user selects search by name
        xhr.open("POST", "php/name_search_bar.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    usersList.innerHTML = data;
                }
            }
        }
    }
    else
    {
        // If user selects search by tags
        xhr.open("POST", "php/tag_search_bar.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    usersList.innerHTML = data;
                }
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(()=>{
    // Start Ajex
    let xhr = new XMLHttpRequest(); // Creating XML object
    // Collect data from online_users.php every 500ms
    xhr.open("GET", "php/online_users.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBar.classList.contains("active")){ 
                    usersList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500); // function run every 500ms