document.addEventListener('DOMContentLoaded', function(){
    document.getElementById("logout").addEventListener("click", function(e){
        e.preventDefault();
        fetch('./assets/PHP/logout.php')
        .then(response => {
            if(response.ok){
                return response.json()
            }
        })
        .then(data => {
            if(data.success){
                window.location.href = "./loginPage.php"
            }
        })
        .catch(error => {
            console.log("Error: ", error);
        })
    })
})