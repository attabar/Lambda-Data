document.addEventListener("DOMContentLoaded", function() {
    fetch("./assets/php/dataPrice.php")
    .then(response => {
        if(!response.ok) {
            throw new Error("Sending request was not okey")
        }
        return response.json()
    })
    .then(data => {
        if(data.success) {
            let dataPrice = data.dataPrice
            let table = "<table border='1'>";
            table += 
            `
            <tr>
            <th>ID</th>
            <th>Data ID</th>
            <th>Network</th>
            <th>Plan Type</th>
            <th>Buy Price</th>
            <th>Sell Price</th>
            <th>Data Type</th>
            <th>Validity</th>
            </tr>
            `;
            for(let i = 0; i < dataPrice.length; i++) {
                table +=
                `
                <tr>
                <td>${dataPrice[i].id}</td>
                <td>${dataPrice[i].data_id}</td>
                <td>${dataPrice[i].network_id}</td>
                <td>${dataPrice[i].plan_type}</td>
                <td>${dataPrice[i].price}</td>
                <td>${dataPrice[i].selling_price}</td>
                <td>${dataPrice[i].data_type}</td>
                <td>${dataPrice[i].validity}</td>
                </tr>
                `;
            }
            table += '</table>';
            document.getElementById('dataPrice').innerHTML = table;
        }
    })
})


// document.getElementById('planType').addEventListener("change", function(e){
//     e.preventDefault();

//     var planType = document.getElementById('planType').value;

//     var formData = new FormData();
//     formData.append('planType', planType);

//     fetch("./assets/php/updateDataPrice.php", {
//         method: 'POST',
//         body: formData
//     })
//     .then(response => {
//         if(!response.ok){
//             throw new Error("Network response was not okey")
//         }
//         return response.json();
//     })
//     .then(data => {
//         var bprice = document.getElementById('buying-price');
//         var sprice = document.getElementById('selling-price');

//         bprice.value = data.price;
//         sprice.value = data.selling_price;
//     })
// })

// // submit to update 
// document.getElementById("updateDataPrice").addEventListener("submit", function(e){
//     e.preventDefault();

//     var network_id = document.getElementById("network-id").value;
//     var planType = document.getElementById("planType").value;
//     var bprice = document.getElementById('buying-price').value;
//     var sprice = document.getElementById('selling-price').value;

//     var formData = new FormData();
//     formData.append("network-id", network_id);
//     formData.append("planType", planType);
//     formData.append("buying-price", bprice);
//     formData.append("selling-price", sprice);

//     fetch("./assets/php/updateDataPrice.php", {
//         method: "POST",
//         body: formData
//     })
//     .then(response => {
//         if(!response.ok){
//             throw new Error("Network response was not okey");
//         }
//         return response.json();
//     })
//     .then(data => {
//         alert(data.message);
//     })
//     .catch(error => {
//         console.log("Error: ", error);
//     })
// })