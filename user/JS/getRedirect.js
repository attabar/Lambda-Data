fetch("./PHP/RedirectBackToLoginPage.php", {
    method: 'GET'
})
.then(response => {
    if(!response.ok){
        throw new Error('Network response was not ok')
    }
    return response;
})
.catch(error => {
    console.log('Error Message: ', error)
})