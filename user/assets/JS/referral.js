document.addEventListener("DOMContentLoaded", function(e){
    e.preventDefault();
    
    fetch("./assets/PHP/referal.php", {
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
            document.getElementById("referral").value = data.referral;
            alert(data.referral)
        }else{
            document.getElementById("referral").innerHTML = data.message;
        }
    })
    .catch(error => {
        console.log("There was a problem with the fetch operation: ", error);
        // window.location.href = './loginPage.php';
    })
})