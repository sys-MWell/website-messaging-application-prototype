const form = document.querySelector(".settings form"),
continueBtn = form.querySelector(".button input"),
availableTags = form.querySelector(".available-tags"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault(); // preventing form from submitting
}

// Check users tags function - must ONLY contain characters 
//'A-Z'' a-z' '0-9' and ',' anything else is not accepted
function onlyLettersAndNumbers(str){
  return /^[A-Za-z0-9,]*$/.test(str);
}

// If button is clicked to submit tags
continueBtn.onclick = ()=>{
    // Start Ajex
    var entry = document.querySelector('[name="users_tags"]').value;
    if (onlyLettersAndNumbers(entry)){
      let xhr = new XMLHttpRequest(); //creating XML object
      xhr.open("POST", "php/settings_user_tag_config.php", true);
      xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                // Response from login_config
                let data = xhr.response;
                // Available tags by user
                furtherresponse = new UserTags(null, entry, availableTags);
                // Appropriate error messages - not failed
                if(data != "failed")
                {
                  errorText.textContent = "";
                  errorText.style.color = "#000";
                  errorText.style.background = "#fff"
                  errorText.style.border = "solid #fff";
                  document.getElementsByName('users_tags')[0].value = data;
                }
                else
                {
                  // Display error
                  data = "Please enter valid tags!";
                  errorText.textContent = data;
                  errorText.style.color = "#721c24";
                  errorText.style.background = "#f8d7da";
                  errorText.style.border = "1px solid #721c24";
                  errorText.style.display = "block";
                }
              }
          }
        }
      // We have to send the form data through ajax to php
      let formData = new FormData(form); // New formData object
      xhr.send(formData); // Send form data to php
    }
    else
    {
      // Display error
      data = "Tag contains invalid characters, must include 'A-Z', 'a-z', '0-9' or ','";
      errorText.textContent = data;
      errorText.style.color = "#721c24";
      errorText.style.background = "#f8d7da";
      errorText.style.border = "1px solid #721c24";
      errorText.style.display = "block";
    }
}

setInterval(()=>{
  // Start Ajex
  // Display availble tags
  var entry = document.querySelector('[name="users_tags"]').value;
  let xhr = new XMLHttpRequest(); //creating XML object
  xhr.open("POST", "php/get_user_tags.php", true);
  xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

              const tagArray = data.split(",");

              if (data != "empty")
              {
                if (tagArray.length >= 12){
                  var limitedTags = tagArray.slice(0, 12);
                  limitedTags.push("...");
                  availableTags.textContent = limitedTags;
                }
                else{
                  availableTags.textContent = data;
                }
                availableTags.style.color = "#000";
                availableTags.style.background = "#fff"
                availableTags.style.border = "solid #fff";
                availableTags.style.display = "block";
                if (entry == "")
                {
                  document.getElementsByName('users_tags')[0].value = data;
                }
              }
              else
              {
                availableTags.textContent = "No available tags";
                availableTags.style.color = "#721c24";
                availableTags.style.background = "#fff"
                availableTags.style.border = "solid #fff";
                availableTags.style.display = "block";
              }
          }
      }
  }
  let formData = new FormData(form); // new formData object
  xhr.send(formData); // send form data to php
}, 500); // function run every 500ms