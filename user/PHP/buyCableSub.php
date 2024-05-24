curl --location 'https://gladtidingsapihub.com/api/cablesub/' \
--header 'Authorization: Token 66f2e5c39ac8640f13cd888f161385b12f7e5e92' \
--header 'Content-Type: application/json' \
--data '{
    "cablename":cablename id,
    "cableplan": cableplan id,
    "smart_card_number": meter
}'