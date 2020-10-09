let fname = document.getElementById("name");
let femail = document.getElementById("email");
let fage = document.getElementById("age");
let fbutton = document.getElementById("update");

fname.addEventListener("blur", valiName);
femail.addEventListener("blur", valiEmail)
fage.addEventListener("blur", valiAge);
fbutton.addEventListener("click", Update);
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
        document.getElementById("mess_name").innerHTML = "Name is invalid"

    } else  {
        document.getElementById("mess_name").innerHTML = ""
    }
}

function valiEmail() {
    let email = femail.value;
    email=regularemail(email);
    femail.value=email
    let vali = checkEmail(email)
    if (vali == 1) {
        document.getElementById("mess_email").innerHTML = "Email is required"
    } else if(vali==2){
        document.getElementById("mess_email").innerHTML = "Email is invalid"
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
        document.getElementById("mess_age").innerHTML = "Please type a number"
    } else  {
        document.getElementById("mess_age").innerHTML = ""
    }
}
function Update() {
    // các biến input
    let email = femail.value;
    let name = fname.value
    let age = fage.value
    // các biến check thỏa mãn điều kiện
    let cemail = false;
    let cname = false;
    let cage = false;
    // biến check giá trị input
    let vemail = checkEmail(email)
    let vname = checkName(name)
    let vage = checkAge(age)
    // check password

    // check email
    if (vemail == 1) {
        document.getElementById("mess_email").innerHTML = "Email is required"
    } else if(vemail==2){
        document.getElementById("mess_email").innerHTML = "Email is invalid"
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
        document.getElementById("mess_name").innerHTML = "Name is invalid"
    } else  {
        document.getElementById("mess_name").innerHTML = ""
        cname=true
    }
    //check age 
    if (vage == 1) {
        document.getElementById("mess_age").innerHTML = "Age is required"
    } else if(vage==2){
        document.getElementById("mess_age").innerHTML = "Please type a number"
    } {
        document.getElementById("mess_age").innerHTML = ""
        cage = true
    }

    // gửi request
    if (cemail && cname && cage) {
        $.ajax({
            type: "POST",  //type of method
            url: "http://localhost:8080/mini-project/Home/EditUser",  //your page
            data: { name: name, email: email, age: age },// passing the values
            success: function (res) {
                console.log(res)
                result= JSON.parse(res)
                let status = result.status
                let mess = result.mess
                if (status !== "true") {
                    document.getElementById(status).innerHTML = mess
                } else {
                alert(mess);
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

function checkName(name) {
    if (name.length == 0) {
        return 1;
    } else if (name.length < 6) {
        return 2;
    } else {
        const str = /[~`!@\.#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/g
        if(str.test(name)){
            return 3
        }
        return 4
    } 
}

function checkAge(age) {
    if (age.length == 0) {
        return 1;
    } else{
        return 3;
    }
}

function regularemail(str){
    let str1 = str.trim();
    return str1.replace(/\s/g,'');
}
function regularname(str){
    let str1 = str.trim();
    return str1.replace(/\s+/g,' ');
}