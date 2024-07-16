<?php
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];

    $referalLink = "<h3>Referal: "."https://www.lambdadata.com/signup?ref=" . $username."</h3>";
}
?>