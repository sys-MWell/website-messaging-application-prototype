// JS for signup page - index.php

// Collects data from form entries - index.php
const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

import userdetails from './classUserDetails.js';

let details = new userdetails(null,
                              document.getElementsByName('fname'),
                              document.getElementsByName('lname'),
                              document.getElementsByName('email'),
                              document.getElementsByName('password'),
                              null);

// If signup button has been clicked
continueBtn.onclick = ()=>{
    // start Ajex - client-side connectivity - retrieve data from a server asynchronously
    let xhr = new XMLHttpRequest(); // Creating XML object
    // Connect to psignup_config.php file (server)
    xhr.open("POST", "php/signup_config.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
              let data = xhr.response;
              // If data successfully submitted (to database, INSERT DATA query successful)
              if(data == "success")
              {
                // Redirect user to users.php
                location.href = "users.php";
              }
              else
              {
                // Display appropriate error message in form
                errorText.textContent = data;
                errorText.style.display = "block";
              }
            }
        }
    }
    // We have to send the form data through ajax to php
    let formData = new FormData(form); // New formData object
    xhr.send(formData); // Send form data to php
}
