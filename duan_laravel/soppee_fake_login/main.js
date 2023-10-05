let apiUser = "http://localhost:3000/user";

function login(){
getUser(handleLogin);
}

function getUser(callback){
    fetch(apiUser).then(function(res){
        return res.json().then(callback);
    });
}

function handleLogin(data){
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    data.forEach(data => {
        if(data.username == username && data.password == password){
            alert("Đăng nhập thành công !")
            window.location.href = "./index.html";
        }else {
            alert("Tài khoản hoặc mật khẩu sai !!!");
        }
    });
}

function signup(){
    handleCrateForm();
    
}
function createUser(data){
    fetch(apiUser,{
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    }).then(function(res){
        return res.json();
    });
    if(data){
        alert("Đăng kí thành công ! Mời bạn đăng nhập");
    }
}
function handleCrateForm(){
    let username = document.getElementById("username");
    let password = document.getElementById("password");
    let nameuser = document.getElementById("nameUser");
    let address = document.getElementById("address");
    let phone = document.getElementById("telphone");
    let avatar = document.getElementById("avatar");

    let user = {
        username : username.value,
        password : password.value,
        nameuser : nameuser.value,
        address : address.value,
        phone : phone.value,
        avatar : avatar.value
    };
    createUser(user);
}