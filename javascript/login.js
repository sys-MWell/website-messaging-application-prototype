// JS for login page - login.php

// Class user requirements
const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault(); // preventing form from submitting
}

continueBtn.onclick = ()=>{
    // let's start Ajex
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/login_config.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
              // response from login_config
              let data = xhr.response;
              if(data == "success")
              {
                location.href = "users.php";
              }
              else
              {
                // display error
                errorText.textContent = data;
                errorText.style.display = "block";
              }
            }
        }
    }
    // we have to send the form data through ajax to php
    let formData = new FormData(form); // new formData object
    xhr.send(formData); // send form data to php
}
