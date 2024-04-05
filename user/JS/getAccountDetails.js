fetch("./PHP/DisplayAccountDetails.php", {
    method: "GET"
})
.then(response => {
    if(!response.ok){
        throw new Error("Response network was not ok");
    }
    return response.json();
})
.then(data => {
    if(data.success){

        var accountNumber = data.accountNumber;
        var accountName = data.accountName;
        var bankName = data.bankName;

        document.getElementById('accNum').innerHTML = accountNumber;
        document.getElementById('accName').innerHTML = accountName;
        document.getElementById('bank').innerHTML = bankName;
    }
})
.catch(error => {
    console.log('Error Message: ', error);
})