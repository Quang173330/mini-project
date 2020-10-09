let foldpass = document.getElementById("old_password");
let fpass = document.getElementById("new_password");
let frepass = document.getElementById("retype_password");
let fbutton = document.getElementById("change_password");

foldpass.addEventListener("blur",checkoldpass);
fpass.addEventListener("blur",checknewpass);
frepass.addEventListener("blur",checkretype);
fbutton.addEventListener("click",submit);

function checkoldpass() {
    let old_password= foldpass.value;
    if (old_password.length == 0) {
        document.getElementById("mess_old").innerHTML = "Password is required"
    }
    else if (old_password.length < 6) {
        document.getElementById("mess_old").innerHTML = "Please lengthen this text to 6 characters or more "
    } else {
        document.getElementById("mess_old").innerHTML = ""
    }
}
function checknewpass(){
    let new_password= fpass.value;
    if (new_password.length == 0) {
        document.getElementById("mess_new").innerHTML = "Password is required"
    }
    else if (new_password.length < 6) {
        document.getElementById("mess_new").innerHTML = "Please lengthen this text to 6 characters or more "
    } else {
        document.getElementById("mess_new").innerHTML = ""
    }
}
function checkretype(){
    let new_password= fpass.value;
    let re_password=frepass.value
    if(new_password!==re_password){
        document.getElementById("mess_retype").innerHTML = "Password not matching"
    } else {
        document.getElementById("mess_retype").innerHTML = ""
    }
}
function submit () {
    let old_password= foldpass.value;
    let new_password= fpass.value;
    let re_password=frepass.value;
    c_old=false;
    c_new=false;
    c_retype=false;
    if (old_password.length == 0) {
        document.getElementById("mess_old").innerHTML = "Password is required"
    }
    else if (old_password.length < 6) {
        document.getElementById("mess_old").innerHTML = "Please lengthen this text to 6 characters or more "
    } else {
        document.getElementById("mess_old").innerHTML = ""
        c_old=true
    }
    if (new_password.length == 0) {
        document.getElementById("mess_new").innerHTML = "Password is required"
    }
    else if (new_password.length < 6) {
        document.getElementById("mess_new").innerHTML = "Please lengthen this text to 6 characters or more "
    } else {
        document.getElementById("mess_new").innerHTML = ""
        c_new=true
    }
    if(new_password!==re_password){
        document.getElementById("mess_retype").innerHTML = "Password not matching"
    } else {
        document.getElementById("mess_retype").innerHTML = ""
        c_retype=true
    }
    if(c_old&&c_new&&c_retype){
        $.ajax({
            type: "POST",  //type of method
            url: "http://localhost:8080/mini-project/Home/ChangePassword",  //your page
            data: { old_password:old_password,password:new_password },// passing the values
            success: function (res) {
                console.log(res)
                result= JSON.parse(res)
                let status = result.status
                let message = result.message
                if (status === "false") {
                    document.getElementById("mess_old").innerHTML = message
                } else {
                    window.location.href = "http://localhost:8080/mini-project/Home/profileUser";
                }
            }
        })
    }
}