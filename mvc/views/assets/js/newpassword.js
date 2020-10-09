let fpass = document.getElementById("new_password");
let fid= document.getElementById("id");
let fbutton = document.getElementById("change_password");

fpass.addEventListener("blur",checknewpass);
fbutton.addEventListener("click",submit);
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
function submit () {
    let id = fid.value
    let new_password= fpass.value;
    c_new=false;
    if (new_password.length == 0) {
        document.getElementById("mess_new").innerHTML = "Password is required"
    }
    else if (new_password.length < 6) {
        document.getElementById("mess_new").innerHTML = "Please lengthen this text to 6 characters or more "
    } else {
        document.getElementById("mess_new").innerHTML = ""
        c_new=true
    }
    if(c_new){
        $.ajax({
            type: "POST",  //type of method
            url: "http://localhost:8080/mini-project/Home/NewPassword",  //your page
            data: { new_password : new_password, id : id },// passing the values
            success: function (res) {
                console.log(res)
                result= JSON.parse(res)
                let status = result.status
                let mess = result.mess
                if (status === "false") {
                    document.getElementById("mess_new").innerHTML = mess
                } else {
                    window.location.href = "http://localhost:8080/mini-project/Home/ViewUser/"+id;
                }
            }
        })
    }


}