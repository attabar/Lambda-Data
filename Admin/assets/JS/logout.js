document.addEventListener('DOMContentLoaded', function(){
    document.getElementById("logout").addEventListener("click", function(e){
        e.preventDefault();
        fetch('./assets/PHP/logout.php', {
            method: 'GET'
        })
        .then(response => {
            if(response.ok){
                window.location.href = "./index.php";
            }else{
                console.log("logout failed");
            }
        })
        .catch(error => {
            console.log("Error: ", error);
        })
    })
})