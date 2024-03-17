
    // Get the query string from the URL
    const queryString = window.location.search;

    // Function to parse the query string and extract the 'error' parameter
    const getParameterByName = (name) => {
        name = name.replace(/[\[\]]/g, "\\$&");
        const regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)");
        const results = regex.exec(queryString);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    };

    // Check if there is an 'error' parameter in the URL
    const error = getParameterByName('error');
    
    if (error === 'invalid_email') {
        // Display an error message to the user
        const errorMessage = 'The email address you provided is invalid. Please enter a valid email address.';
        // You can display this error message in a specific element on your form or as an alert, for example.
        // Replace 'error-message-element' with the actual element you want to display the error in.
        document.getElementById('message').innerText = errorMessage;
    }