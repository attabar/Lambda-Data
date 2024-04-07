fetch("./PHP/Profile.php", {
    method: 'GET'
})
.then(response => {
    if(!response.ok){
        throw new Error("Response network was not ok");
    }
    return response.json();
})
.then(data => {
    console.log(data)
    if(data.success){
        document.getElementById('fullname').innerHTML = data.fname + ' ' + data.lname;
        document.getElementById('username').innerHTML = data.username;
        document.getElementById('email').innerHTML = data.email;
        document.getElementById('mobile').innerHTML = data.mobile;
        
    }else{
        console.log(data.success)
    }
})
.catch(error => {
    console.log("Error Message: ", error);
})