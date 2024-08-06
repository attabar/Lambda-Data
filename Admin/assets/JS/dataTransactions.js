document.addEventListener("DOMContentLoaded", function(){
    fetch('./assets/php/RecentTransaction.php')
        .then(response => {
            if(!response.ok){
                throw new Error("Sending request was not okey")
            }
            return response.json();
        })
        .then(data => {
            if(data && data.success){
                const current_transactions = data.current_transactions
                alert(current_transactions.plan_name)
                let table = '<table border="1">';
                table += `
                    <tr>
                        <th>ID</th>
                        <th>plan network</th>
                        <th>mobile number</th>
                        <th>plan</th>
                        <th>status</th>
                        <th>plan name</th>
                        <th>plan amount</th>
                        <th>create date</th>
                    </tr>
                 `;
                    table += `
                        <tr>
                            <td>${current_transactions.transaction_id}</td>
                            <td>${current_transactions.plan_network}</td>
                            <td>${current_transactions.mobile_number}</td>
                            <td>${current_transactions.plan}</td>
                            <td>${current_transactions.status}</td>
                            <td>${current_transactions.plan_name}</td>
                            <td>${current_transactions.plan_amount}</td>
                            <td>${current_transactions.create_date}</td>
                        </tr>
                    `;
            table += '</table>';
            document.getElementById("recent").innerHTML = table;
                }
            })
})