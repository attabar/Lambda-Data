document.getElementById('checkoutForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const amount = document.getElementById('amount').value;
    const overlay = document.querySelector('.loading-overlay');
    const spinner = document.querySelector('.spinner');

    // Show the spinner
    overlay.style.display = 'block';
    spinner.style.display = 'block';

    fetch('./assets/PHP/checkOut.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'amount': amount
        })
    })
    .then(response => response.json())
    .then(data => {

        // Hide the spinner
        overlay.style.display = 'none';
        spinner.style.display = 'none';

        if (data.success) {
            window.location.href = data.redirectUrl;
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => { 
        // Hide the spinner
        overlay.style.display = 'none';
        spinner.style.display = 'none';
        console.error('Error:', error)
});
});
