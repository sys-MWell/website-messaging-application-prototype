const searchBar = document.querySelector(".available-chats .search input"),
searchBtn = document.querySelector(".available-chats .search button"),
searchSwitch = document.getElementById('search-switch'),
usersList = document.querySelector(".available-chats .available-chat-list");

searchBtn.onclick = ()=>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
}

searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active"); 
    }else{
        searchBar.classList.remove("active");
    }

    // start ajax
    let xhr = new XMLHttpRequest();
    if (searchSwitch.checked){  
        xhr.open("POST", "php/name_discussion_search.php", true);
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
        //tag
        xhr.open("POST", "php/tag_discussion_search.php", true);
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
    // let's start Ajex
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("GET", "php/discussions.php", true);
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