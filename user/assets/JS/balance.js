document.addEventListener("DOMContentLoaded", function(){
    
        fetch('./assets/PHP/balance.php')
        .then(response => {
            if(!response.ok){
                throw new Error("request was failed to resolved");
            }
            return response.json();
        })
        .then(data => {
            if(data.success){
                var accountBalance = data.balance;
                document.getElementById("accBalance").innerHTML = "₦" + accountBalance;
                document.getElementById("dynamicAccBalance").innerHTML = "₦" + accountBalance;
            }else{
                document.getElementById("accBalance").innerHTML = "₦" + "0.00";
            }
        })
})
