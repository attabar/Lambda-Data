<html>
<head>
    <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>
    <script>
        function payWithMonnify() {
            MonnifySDK.initialize({
                amount: 100,
                currency: "NGN",
                reference: new String((new Date()).getTime()),
                customerFullName: "Muhammad Abdulmalik",
                customerEmail: "mabdulmalik436@gmail.com",
                apiKey: "MK_TEST_KWB4J5FHZN",
                contractCode: "0378523971",
                paymentDescription: "Lahray World",
                metadata: {
                    "name": "Damilare",
                    "age": 45
                },
                incomeSplitConfig: [{
                    "subAccountCode": "MFY_SUB_342113621921",
                    "feePercentage": 50,
                    "splitAmount": 1900,
                    "feeBearer": true
                }, {
                    "subAccountCode": "MFY_SUB_342113621922",
                    "feePercentage": 50,
                    "splitAmount": 2100,
                    "feeBearer": true
                }],

                onLoadStart: () => {
                    console.log("loading has started");
                },
                onLoadComplete: () => {
                    console.log("SDK is UP");
                },

                onComplete: function(response) {
                    //Implement what happens when the transaction is completed.
                    console.log(response);
                },
                onClose: function(data) {
                    //Implement what should happen when the modal is closed here
                    console.log(data);
                }
            });
        }
    </script>
</head>

<body>
    <div>
        <button type="button" onclick="payWithMonnify()">Pay With Monnify</button>
    </div>
</body>
</html>
