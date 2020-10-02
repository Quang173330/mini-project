let femail = document.getElementById("email");
let fpass = document.getElementById("password");
let fshow = document.getElementById("show");
let fbutton = document.getElementById("button");
let frem = document.getElementById("rememberme");


fbutton.addEventListener("click", sendRequest);
fshow.addEventListener("click", show);
fpass.addEventListener("blur", valiPass);
femail.addEventListener("blur", valiEmail);
function a() {
    console.log("a")
}
function sendRequest() {
    let password = fpass.value;
    let email = femail.value;
    let rememberme = frem.checked;
    console.log(rememberme)
    let cpass = false;
    let cemail = false;
    let vemail = checkEmail(email)
    let vpass = checkPassword(password)
    if (vpass === 1) {
        document.getElementById("mess_pass").innerHTML = "Password is required"
    } else if (vpass === 2) {
        document.getElementById("mess_pass").innerHTML = "Please lengthen this text to 6 characters or more"
    } else {
        document.getElementById("mess_pass").innerHTML = ""
        cpass = true;
    }
    if (vemail === 1) {
        document.getElementById("mess_email").innerHTML = "Email is required"
    }
    else {
        document.getElementById("mess_email").innerHTML = ""
        cemail = true;
    }
    if (cpass && cemail) {
        $.ajax({
            type: "POST",  //type of method
            url: "http://localhost:8080/mini-project/Login/logina",  //your page
            data: { email: email, password: password,rememberme : rememberme },// passing the values
            success: function (res) {
                result= JSON.parse(res)
                console.log("hi")
                console.log(result)
//                window.location.href = "http://localhost/mini-project/Home/profileuser";
            }
        })
    } else {
        console.log("error")
    }
}

function valiPass() {
    let password = fpass.value;

    let vali = checkPassword(password);
    if (vali === 1) {
        document.getElementById("mess_pass").innerHTML = "Password is required"
    } else if (vali === 2) {
        document.getElementById("mess_pass").innerHTML = "Please lengthen this text to 6 characters or more"
    } else {
        document.getElementById("mess_pass").innerHTML = ""
    }
}
function valiEmail() {
    let email = femail.value;
    let vali = checkEmail(email)
    if (vali == 1) {
        document.getElementById("mess_email").innerHTML = "Email is required"
    }
    else {
        document.getElementById("mess_email").innerHTML = ""
    }
}
function show() {
    let x = fpass.type;
    if (x == "text") {
        fpass.setAttribute("type", "password");
    } else {
        fpass.setAttribute("type", "text");
    }
}
function checkEmail(email) {
    if (email.length == 0) {
        return 1
    } else {
        return 2
    }
}
function checkPassword(password) {
    if (password.length === 0) {
        return 1;
    } else if (password.length < 6) {
        return 2;
    } else {
        return 3;
    }
}