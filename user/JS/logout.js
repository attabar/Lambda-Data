document.addEventListener('DOMContentLoaded', function(){
    document.getElementById("logout").addEventListener("click", function(e){
        e.preventDefault();
        fetch('./PHP/logout.php', {
            method: 'GET'
        })
        .then(response => {
            console.log(response)
            if(response.ok){
                window.location.href = "./loginPage.php";
            }else{
                console.log("logout failed");
            }
        })
        .catch(error => {
            console.log("Error: ", error);
        })
    })
})