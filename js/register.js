function validateRegister() {

    const username = document.getElementById('name').value;
    const error_name = document.getElementById('error_name');

    const password = document.getElementById('password').value;
    const error_password = document.getElementById('error_password');

    const emailValue = document.getElementById('email').value;
    const error_email = document.getElementById('error_email');

    const password2 = document.getElementById('password2').value;
    const error_password2 = document.getElementById('error_password2');
    
    let check = true

    if (username == ""){
        error_name.innerHTML = "Username cannot be blank";
        check = false 
    }

    if (emailValue == ""){
        error_email.innerHTML = "Email cannot be blank";
        check = false 
    }else if (!emailValue.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {
        error_email.innerHTML = "Invalid email";
        check = false;
    }

    if (password == ""){
        error_password.innerHTML = "Password cannot be blank";
        check = false;
    }else if (password.length <= 4) {
        error_password.innerHTML = "Password must longer than 4";
        check = false;
    }

     if (password2 == ""){
        error_password2.innerHTML = "Confirm password cannot be blank";
        check = false;
    }else if (password != password2) {
        error_password2.innerHTML = "Confirm password not matched";
        check = false;
    }

return check
}

// function ValidEmail(testEmail) 
// {
//    return sta = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(testEmail);
     
// }

