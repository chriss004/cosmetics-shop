<?php
session_start();

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
    header("Location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

html, body{
    width:100%;
    height:100%;
}

body{
    background-image:url("jibong.jpeg");
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    display:flex;
    justify-content:center;
    align-items:center;
}

.login-box{
    width:380px;
    padding:30px;
    background:rgba(0,0,0,0.45);
    backdrop-filter:blur(14px);
    -webkit-backdrop-filter:blur(14px);
    border-radius:20px;
    box-shadow:0 25px 50px rgba(0,0,0,0.6);
    color:white;
}

.login-box h2{
    text-align:center;
    font-size:30px;
    margin-bottom:25px;
}

label{
    font-size:14px;
    display:block;
    margin-bottom:6px;
}

input{
    width:100%;
    padding:12px;
    margin-bottom:18px;
    border:none;
    border-radius:10px;
    outline:none;
    background:rgba(255,255,255,0.9);
}

.forgot{
    color:red;
    font-size:13px;
    margin-bottom:20px;
    cursor:pointer;
}

button{
    width:100%;
    padding:13px;
    border:none;
    border-radius:25px;
    background:#1fb6ff;
    color:white;
    font-size:16px;
    cursor:pointer;
}

.register{
    margin-top:18px;
    font-size:14px;
    color:#3b82f6;
    cursor:pointer;
}
</style>
</head>

<body>

<div class="login-box">
    <h2>Login</h2>

    <label>Email:</label>
    <input type="email" id="email" placeholder="Enter email">

    <label>Password:</label>
    <input type="password" id="password" placeholder="Enter password">

    <div class="forgot">Forgot password!</div>

    <button onclick="login()">Login</button>

    <div class="register" onclick="window.location.href='register.php'">
        Register
    </div>
</div>

<script>
function login(){
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    if(email === "" || password === ""){
        alert("Please fill all fields");
        return;
    }

    // Send to PHP backend for authentication
    fetch("authenticate.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            email: email,
            password: password
        })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){
            alert("Login successful");
            localStorage.setItem("isLoggedIn", "true");
            window.location.href = "home.php";
        } else {
            alert("Wrong email or password");
        }
    })
    .catch(error => {
        alert("Login error: " + error);
    });
}
</script>

</body>
</html>
