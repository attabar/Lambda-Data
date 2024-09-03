function createWallet() {
    let url = './assets/PHP/createWallet.php';

    fetch(url, {
        method: 'GET'
    })
    .then(response => { return response.json() })
    .then(data => {
        if(data.success === false) {
            alert(data.message);
        } else {
            alert(data.message)
        }
    })
}