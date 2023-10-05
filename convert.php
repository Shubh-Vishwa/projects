<?php
// Connect to the database
$db = new mysqli('localhost', 'root', 'Gamechanger1234', 'shubhu_db');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get user input
$amount = $_POST['amount'];
$base_currency = $_POST['base_currency'];
$target_currency = $_POST['target_currency'];

// Check if the exchange rate exists in the database
$query = "SELECT rate FROM exchange_rates WHERE base_currency='$base_currency' AND target_currency='$target_currency' AND TIMESTAMPDIFF(MINUTE, timestamp, NOW()) <= 30";

$result = $db->query($query);

if ($result->num_rows > 0) {
    // Rate is available in the database, use it for conversion
    $row = $result->fetch_assoc();
    $rate = $row['rate'];
} else {
    // Rate is not available or older than 30 minutes, fetch it from the API
    // $api_key = '6974e05c1c1a78bea45ce81722297eb4';
    // $api_url = "https://api.apilayer.com/exchangerates_data/latest?base=$base_currency&apikey=$api_key";

    // $api_url = "http://api.exchangeratesapi.io/v1/latest?access_key=6974e05c1c1a78bea45ce81722297eb4&format=1";
    $api_url = "http://api.exchangeratesapi.io/v1/latest?access_key=6974e05c1c1a78bea45ce81722297eb4&format=1";

    $response = file_get_contents($api_url);

    if ($response === FALSE) {
        die("Error fetching data from the API");
    }

    $data = json_decode($response);
    $rate = $data->rates->$target_currency;

    // Update the rate in the database
    $update_sql = "UPDATE shubhu_db.exchange_rates SET rate=$rate, timestamp=NOW() WHERE base_currency='$base_currency' AND target_currency='$target_currency'";
    $db->query($update_sql);
}

// Perform currency conversion
$result_amount = $amount * $rate;

// Close the database connection
$db->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Currency Converter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Currency Converter</h1>
    <p><?php echo $amount; ?> <?php echo $base_currency; ?> is equal to <?php echo $result_amount; ?> <?php echo $target_currency; ?></p>
</body>
</html>
