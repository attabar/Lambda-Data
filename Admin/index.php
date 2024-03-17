<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="./CSS/adminLogin.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.jpg">
</head>
<body>
    <div class="form-container">
        <form id="loginForm" autocomplete="off">
        <h1 id="test">Admin Login</h1>
        <div class="result" style="text-align: center;"></div>
            <div class="username col">
                <label for="username">USERNAME</label>
                <input type="text" id="username" class="message">
            </div>
            <div class="password col">
                <label for="password">PASSWORD</label>
                <input type="password" id="password" class="message">
            </div>
            <div class="submit col">
                <button id="loginBtn" name="loginBtn">Login</button>
            </div>
        </form>
        <div id="error-message"></div>
    </div>
    <script src="../user/JQUERY/jquery.js"></script>
    <script>
        $("document").ready(function(){
            $("#loginForm").submit(function(e){
                e.preventDefault()
                let username = $("#username").val();
                let password = $("#password").val(); 
                $.ajax({
                    type: "POST",
                    url: "./php/login.php",
                    data: {username: username, password: password},
                    success: function(response){
                        $(".message").html('');
                        $(".result").html(response);
                        if(response.includes("You're Authorised to access this site")){
                            $("#username").after('<span style="color: green;">&#10004;</span>')
                            $("#password").after('<span style="color: green;">&#10004;</span>')
                            $("#loginBtn").text("Authenticating...").css("opacity", 0.4);
                            $(".form-container").css("height", "30%");
            

                            // delay of 5 seconds before redirection
                            setTimeout(function(){
                                window.location.href = "./dashboards.php"
                            }, 5000)
                        }else{
                            $(".form-container").css("height", "30%");
                            if(!username){
                                $("#username").after('<span style="color: red;">&#10008; Please enter a username</span>');
                            }
                            if(!password){
                                $("#password").after("<span style='color: red'>&#10008; Please enter a password</span>");
                            }
                        }
                    }
                })
            })
        })
    </script>
</body>
</html>