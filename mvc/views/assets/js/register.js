let fname = document.getElementById("name");
let femail = document.getElementById("email");
let fpass = document.getElementById("password");
let frepass = document.getElementById("re_password");
let fage = document.getElementById("age");
let fbutton = document.getElementById("button");

fname.addEventListener("blur", valiName);
frepass.addEventListener("blur", valiRePass);
fpass.addEventListener("blur", valiPass);
femail.addEventListener("blur", valiEmail)
fage.addEventListener("blur", valiAge);
fbutton.addEventListener("click", Register);

function valiName() {
    let name = fname.value;
    console.log(name)
    name=regularname(name);
    fname.value=name
    console.log(name)
    let vali = checkName(name)
    if (vali == 1) {
        document.getElementById("mess_name").innerHTML = "Name is required"
    } else if(vali==2){
        document.getElementById("mess_name").innerHTML = "Please lengthen this text to 6 characters or more"
    } else if(vali==3){
        document.getElementById("mess_name").innerHTML = "Please enter correct name format"

    } else  {
        document.getElementById("mess_name").innerHTML = ""
    }
}
function valiPass() {
    let password = fpass.value;
    if (password.length == 0) {
        document.getElementById("mess_pass").innerHTML = "Password is required"
    }
    else if (password.length < 6) {
        document.getElementById("mess_pass").innerHTML = "Please lengthen this text to 6 characters or more "
    } else {
        document.getElementById("mess_pass").innerHTML = ""

    }
}
function valiRePass() {
    let password = fpass.value;
    let rePassword = frepass.value;
    console.log(password);
    console.log(rePassword)
    if (password !== rePassword) {
        document.getElementById("confirm_password").innerHTML = "Not matching password !"
    } else {
        document.getElementById("confirm_password").innerHTML = ""

    }
}

function valiEmail() {
    let email = femail.value;
    let vali = checkEmail(email)
    if (vali == 1) {
        document.getElementById("mess_email").innerHTML = "Email is required"
    } else if(vali==2){
        document.getElementById("mess_email").innerHTML = "Please enter correct email format"
    } else {
        document.getElementById("mess_email").innerHTML = ""
    }
}

function valiAge() {
    let age = fage.value
    let vali = checkAge(age)
    if (vali == 1) {
        document.getElementById("mess_age").innerHTML = "Age is required"
    } else if(vali==2){
        document.getElementById("mess_age").innerHTML = "Please enter correct date format"
    } else  {
        document.getElementById("mess_age").innerHTML = ""
    }
}

function Register() {
    // các biến input
    let password = fpass.value;
    let email = femail.value;
    let name = fname.value
    let age = fage.value
    let repass = frepass.value;
    // các biến check thỏa mãn điều kiện
    let cpass = false;
    let cemail = false;
    let crepass = false;
    let cname = false;
    let cage = false;
    // biến check giá trị input
    let vemail = checkEmail(email)
    let vpass = checkPassword(password)
    let vname = checkName(name)
    let vage = checkAge(age)
    let vrepass = checkRePassword(password, repass)
    // check password
    if (vpass === 1) {
        document.getElementById("mess_pass").innerHTML = "Password is required"
    } else if (vpass === 2) {
        document.getElementById("mess_pass").innerHTML = "Please lengthen this text to 6 characters or more"
    } else {
        document.getElementById("mess_pass").innerHTML = ""
        cpass = true;
    }
    // check email
    if (vemail == 1) {
        document.getElementById("mess_email").innerHTML = "Email is required"
    } else if(vemail==2){
        document.getElementById("mess_email").innerHTML = "Please enter correct email format"
    } else {
        document.getElementById("mess_email").innerHTML = ""
        cemail=true
    }
    // check name 
    if (vname == 1) {
        document.getElementById("mess_name").innerHTML = "Name is required"
    } else if(vname==2){
        document.getElementById("mess_name").innerHTML = "Please lengthen this text to 6 characters or more"
    } else if(vname==3){
        document.getElementById("mess_name").innerHTML = "Please enter correct name format"
    } else  {
        document.getElementById("mess_name").innerHTML = ""
        cname=true
    }
    //check age 
    if (vage == 1) {
        document.getElementById("mess_age").innerHTML = "Age is required"
    } else if(vage==2){
        document.getElementById("mess_age").innerHTML = "Please enter correct date format"
    } {
        document.getElementById("mess_age").innerHTML = ""
        cage = true
    }
    //check pass=repass
    if (vrepass == 2) {
        document.getElementById("confirm_password").innerHTML = "Not matching password"
    } else {
        document.getElementById("confirm_password").innerHTML = ""
        crepass = true
    }
    // gửi request
    if (cpass && cemail && crepass && cname && cage) {
        $.ajax({
            type: "POST",  //type of method
            url: "http://localhost:8080/mini-project/Register/registera",  //your page
            data: { name: name, email: email, password: password, age: age },// passing the values
            success: function (res) {
                console.log("a")
                console.log(res)
                result= JSON.parse(res)
                let status = result.status
                let mess = result.mess
                if (status !== "true") {
                    document.getElementById(status).innerHTML = mess
                } else {
                    window.location.href = "http://localhost:8080/mini-project/Home/profileUser";
                }
            }
        })
    } else {
        console.log("error")
    }
}


function checkEmail(email) {
    if (email.length == 0) {
        return 1
    } else {
        const str = /^(([^<>()\[\]\\.,;:\s@'"]+(\.[^<>()\[\]\\.,;:\s'@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        if(str.test(email)){
            return 3
        }
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

function checkName(name) {
    if (name.length == 0) {
        return 1;
    } else if (name.length < 6) {
        return 2;
    } else {
        const str = /^[A-Za-z ]+$/
        if(str.test(name)){
            return 4
        }
        return 3
    } 
}

function checkRePassword(password1, password2) {
    if (password1 === password2) {
        return 1;
    } else return 2;
}
function checkAge(age) {
    if (age.length == 0) {
        return 1;
    } else{
        return 3;
    }
    //     const str = /^[0-9]+$/
    //     if(!str.test(age)){
    //         return 2;
    //     }
    //     return 3;
    // } 
}

function regularemail(str){
    let str1 = str.trim();
    return str1.replace(/\s/g,'');
}
function regularname(str){
    let str1 = str.trim();
    return str1.replace(/\s+/g,' ');
}