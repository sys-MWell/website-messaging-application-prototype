const form = document.querySelector(".discussion-create form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault(); // Preventing form from submitting
}

class DiscussionDetails
{
    constructor(chatid, uniquechatid, title, description, status, tags, icon)
    {
        this.ChatId = chatid;
        this.UniqueChatId = uniquechatid;
        this.Title = title;
        this.Description = description;
        this.Status = status;
        this.Tags = tags;
        this.Icon = icon;
    }

    getDiscussionDetailsChatId()
    {
        return this.ChatId;
    }

    getDiscussionDetailsUniqueChatId()
    {
        return this.Unique;
    }

    getDiscussionDetailsTitle()
    {
        return this.Title;
    }

    getDiscussionDetailsDescription()
    {
        return this.Description;
    }

    getDiscussionDetailsStatus()
    {
        return this.Status;
    }

    getDiscussionDetailsTags()
    {
        return this.Tags;
    }

    getDiscussionDetailsIcon()
    {
        return this.Icon;
    }
}

// Function to only accept certain characters
function onlyLettersAndNumbers(str){
  return /^[A-Za-z0-9,]*$/.test(str);
}

continueBtn.onclick = ()=>{
  // let's start Ajex
  var entry = document.querySelector('[name="tags"]').value;
  if (onlyLettersAndNumbers(entry)){
    errorText.textContent = entry;
    let xhr = new XMLHttpRequest(); // Creating XML object
    // Create discussion set by user
    xhr.open("POST", "php/create_discussion_config.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
              let data = xhr.response;
              if(data == "success")
              {
                location.href = "available_discussions.php";
              }
              else
              {
                errorText.textContent = data;
                errorText.style.display = "block";
              }
            }
        }
    }
    // we have to send the form data through ajax to php
    let formData = new FormData(form); //new formData object
    xhr.send(formData); //send form data to php
  }
  {
    // Display appropriate error message
    data = "Tag contains invalid characters, must include 'A-Z', 'a-z', '0-9' or ','";
    errorText.textContent = data;
    errorText.style.color = "#721c24";
    errorText.style.background = "#f8d7da";
    errorText.style.border = "1px solid #721c24";
    errorText.style.width = "360px";
    errorText.style.display = "block";
  }
}
