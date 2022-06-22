// JS for signup page - index.php

// Class - UserDetails
class UserDetails
{
    constructor(uniqueuserid, firstname, lastname, email, tags)
    {
        this.UniqueUserId = uniqueuserid;
        this.FirstName = firstname;
        this.LastName = lastname;
        this.Email = email;
        this.Tags = tags;
    }

    getUserDetailsUnqiueId()
    {
        return this.UniqueUserId;
    }

    getUserDetailsFirstName()
    {
        return this.FirstName;
    }

    getUserDetailsLastName()
    {
        return this.LastName;
    }

    getUserDetailsEmail()
    {
        return this.Email;
    }

    getUserDetailsTags()
    {
        return this.Tags;
    }
}

// Collects data from form entries - index.php
const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

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
    // Assign data to user details class
    let user = new UserDetails(null, formData, formData[1], formData[2], formData[3], null);
    xhr.send(formData); // Send form data to php
}
