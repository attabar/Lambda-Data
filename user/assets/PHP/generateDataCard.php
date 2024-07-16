curl --location 'https://gladtidingsapihub.com/api/datarechargepin/' \
--header 'Authorization: Token {token}' \
--header 'Content-Type: application/json' \
--data '{"network": "network_name", // MTN
"data_plan": "plan_id", // Mtn 1.5gb id = 1
"quantity": "quantity", // 1,2 0r 5
"name_on_card": "name_on_card"
}'