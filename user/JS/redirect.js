document.addEventListener("DOMContentLoaded", function(e){
    e.preventDefault();
    
    fetch("./PHP/RedirectBackToLoginPage.php", {
        method: "GET"
    })
    .then(response => {
        if(!response.ok){
            throw new Error("network was not okey")
        }
        return response.json();
    })
    .then(data => {
        if(data.success){
            document.getElementById("username").innerHTML = data.username;
        }else{
            window.location.href = "./loginPage.php"
        }
    })
})