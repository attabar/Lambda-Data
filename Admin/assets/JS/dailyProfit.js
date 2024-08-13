document.addEventListener("DOMContentLoaded", function() {
    fetch("./assets/php/dailyProfit.php")
        .then(res => { return res.json() })
        .then(data => { document.getElementById('dailyProfit').innerHTML = '₦' + data.dailyProfit })
})