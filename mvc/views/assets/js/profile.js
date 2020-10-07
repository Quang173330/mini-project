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
    if (name == "") {
        document.getElementById("mess_name").innerHTML = "Name is required "
    } else if (name.length < 6) {
        document.getElementById("mess_name").innerHTML = "Please lengthen this text to 6 characters or more "
    } else {
        document.getElementById("mess_name").innerHTML = ""
    }
}
function valiEmail() {
    let email = femail.value
    let vali = checkEmail(email)
    if (vali == 1) {
        document.getElementById("mess_email").innerHTML = "Email is required"
    } else {
        document.getElementById("mess_email").innerHTML = ""
    }
}

function valiAge() {
    let age = fage.value
    let vali = checkAge(age)
    if (vali == 1) {
        document.getElementById("mess_age").innerHTML = "Age is required"
    } else {
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
    if (vemail === 1) {
        document.getElementById("mess_email").innerHTML = "Email is required"
    }
    else {
        document.getElementById("mess_email").innerHTML = ""
        cemail = true;
    }
    // check name 
    if (vname == 1) {
        document.getElementById("mess_name").innerHTML = "Name is required"
    } else if (vname == 2) {
        document.getElementById("mess_name").innerHTML = "Please lengthen this text to 6 characters or more"
    } else {
        document.getElementById("mess_name").innerHTML = ""
        cname = true
    }
    //check age 
    if (vage == 1) {
        document.getElementById("mess_age").innerHTML = "Age is required"
    } else {
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
                let mess = result.message
                if (status === "false") {
                    document.getElementById("mess_email").innerHTML = mess
                } else {
                //    window.location.href = "http://localhost:8080/mini-project/Home/profileUser";
                console.log(result)
                console.log(typeof result)
                }
            }
        })
    } else {
        console.log("error")
    }
}




function checkAge(age) {
    if (age.length == 0) {
        return 1;
    } else return 2;
}
function checkName(name) {
    if (name.length == 0) {
        return 1;
    } else if (name.length < 6) {
        return 2;
    } else return 3;
}
function checkEmail(email) {
    if (email.length == 0) {
        return 1
    } else {
        return 2
    }
}