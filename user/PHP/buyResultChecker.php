curl --location 'https://gladtidingsapihub.com/api/epin/' \
--header 'Authorization: Token {token}' \
--header 'Content-Type: application/json' \
--data '{"exam_name":exam_name, // WAEC OR NECO OR NABTEB
"quantity": "quantity" // 1,2 0r 5
}'