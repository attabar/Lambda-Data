fetch("./assets/PHP/Profile.php", {
    method: 'GET'
})
.then(response => {
    console.log(response)
    if(!response.ok){
        throw new Error("Response network was not ok");
    }
    return response.json();
})
.then(data => {
    if(data.success){
        document.getElementById('fullname').innerHTML = data.fullname;
        document.getElementById('fullname2').innerHTML = data.fullname2;
        document.getElementById('email').innerHTML = data.email;
        document.getElementById('mobile').innerHTML = data.mobile;
        
    }else{
        console.log(data.success)
    }
})
.catch(error => {
    console.log("Error Message: ", error);
})