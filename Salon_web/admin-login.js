document.getElementById("loginForm").addEventListener("submit", function(e){

e.preventDefault();

let username = document.getElementById("username").value.trim();
let password = document.getElementById("password").value.trim();
let error = document.getElementById("error-msg");

/* ADMIN LOGIN DETAILS */

let adminUser = "phoenix";
let adminPass = "admin123";

/* LOGIN CHECK */

if(username === adminUser && password === adminPass){

window.location.href = "admin.php";

}else{

error.innerText = "Invalid Username or Password";

}

});