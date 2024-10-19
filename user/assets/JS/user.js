document.addEventListener("DOMContentLoaded", function(e){
    e.preventDefault();
    
    fetch("./assets/PHP/user.php", {
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
            document.getElementById("fullname").innerHTML = data.fullname;
        }else{
            window.location.href = "./loginPage.php"
        }
    })
    .catch(error => {
        console.log("There was a problem with the fetch operation: ", error);
        // window.location.href = './loginPage.php';
    })
})