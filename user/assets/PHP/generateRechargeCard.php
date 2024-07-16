curl --location 'https://gladtidingsapihub.com/api/rechargepin/' \
--header 'Authorization: Token {token}' \
--header 'Content-Type: application/json' \
--data '{"network": "network_id", // Mtn id = 1
"network_amount": "network_amount_id", // Mtn N100 id = 1
"quantity": "quantity", // 1,2 0r 5
"name_on_card": "name_on_card"
}'