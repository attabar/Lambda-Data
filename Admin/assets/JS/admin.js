document.addEventListener("DOMContentLoaded", function(){
    fetch("./assets/PHP/admin.php")
    .then(response => {
        if(!response.ok){
            throw new Error("Network was connection having problem")
        }
        return response.json();
    })
    .then(data => {
        if(data.success){
            let admin = document.getElementById("username");
            admin.innerHTML = data.admin
        }else{
            window.location.href = "./index.php";
        }
    })
})