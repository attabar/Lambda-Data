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
        document.getElementById('username').innerHTML = data.username;
    }else{
        console.log(data.success)
    }
})
.catch(error => {
    console.log("Error Message: ", error);
})