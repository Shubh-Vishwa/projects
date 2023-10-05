<!DOCTYPE html>

<html lang="en">


<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link rel="stylesheet" href="index1.css">



</head>
<body>
    <h1>CURRENCY CONVERTER</h1>
    




    <form method="post">

        <label>Enter Amount:</label>

        <input type="number" name="amt" required /><br><br><br>

        <label>

            <label>From1</label>
            <select name="fromCur">
                <option value="">Select One …</option>
                <option value="USD">USD</option>
                <option value="AED">AED</option>
                <option value="ARS">ARS</option>
                <option value="AUD">AUD</option>
                <option value="BGN">BGN</option>
                <option value="BRL">BRL</option>
                <option value="BSD">BSD</option>
                <option value="CAD">CAD</option>
                <option value="CHF">CHF</option>
                <option value="CLP">CLP</option>
                <option value="CNY">CNY</option>
                <option value="COP">COP</option>
                <option value="CZK">CZK</option>
                <option value="DKK">DKK</option>
                <option value="DOP">DOP</option>
                <option value="EGP">EGP</option>
                <option value="EUR">EUR</option>
                <option value="FJD">FJD</option>
                <option value="GBP">GBP</option>
                <option value="GTQ">GTQ</option>
                <option value="HKD">HKD</option>
                <option value="HRK">HRK</option>
                <option value="HUF">HUF</option>
                <option value="IDR">IDR</option>
                <option value="ILS">ILS</option>
                <option value="INR">INR</option>
                <option value="ISK">ISK</option>
                <option value="JPY">JPY</option>
                <option value="KRW">KRW</option>
                <option value="KZT">KZT</option>
                <option value="MVR">MVR</option>
                <option value="MXN">MXN</option>
                <option value="MYR">MYR</option>
                <option value="NOK">NOK</option>
                <option value="NZD">NZD</option>
                <option value="PAB">PAB</option>
                <option value="PEN">PEN</option>
                <option value="PHP">PHP</option>
                <option value="PKR">PKR</option>
                <option value="PLN">PLN</option>
                <option value="PYG">PYG</option>
                <option value="RON">RON</option>
                <option value="RUB">RUB</option>
                <option value="SAR">SAR</option>
                <option value="SEK">SEK</option>
                <option value="SGD">SGD</option>
                <option value="THB">THB</option>
                <option value="TRY">TRY</option>
                <option value="TWD">TWD</option>
                <option value="UAH">UAH</option>
                <option value="UYU">UYU</option>
                <option value="ZAR">ZAR</option>
            </select>
        </label>

        <br />

        <br />

        <label>

            <label>To1</label>

            <select name="toCur" required id="">
                <option value="">Select One …</option>
                <option value="USD">USD</option>
                <option value="AED">AED</option>
                <option value="ARS">ARS</option>
                <option value="AUD">AUD</option>
                <option value="BGN">BGN</option>
                <option value="BRL">BRL</option>
                <option value="BSD">BSD</option>
                <option value="CAD">CAD</option>
                <option value="CHF">CHF</option>
                <option value="CLP">CLP</option>
                <option value="CNY">CNY</option>
                <option value="COP">COP</option>
                <option value="CZK">CZK</option>
                <option value="DKK">DKK</option>
                <option value="DOP">DOP</option>
                <option value="EGP">EGP</option>
                <option value="EUR">EUR</option>
                <option value="FJD">FJD</option>
                <option value="GBP">GBP</option>
                <option value="GTQ">GTQ</option>
                <option value="HKD">HKD</option>
                <option value="HRK">HRK</option>
                <option value="HUF">HUF</option>
                <option value="IDR">IDR</option>
                <option value="ILS">ILS</option>
                <option value="INR">INR</option>
                <option value="ISK">ISK</option>
                <option value="JPY">JPY</option>
                <option value="KRW">KRW</option>
                <option value="KZT">KZT</option>
                <option value="MVR">MVR</option>
                <option value="MXN">MXN</option>
                <option value="MYR">MYR</option>
                <option value="NOK">NOK</option>
                <option value="NZD">NZD</option>
                <option value="PAB">PAB</option>
                <option value="PEN">PEN</option>
                <option value="PHP">PHP</option>
                <option value="PKR">PKR</option>
                <option value="PLN">PLN</option>
                <option value="PYG">PYG</option>
                <option value="RON">RON</option>
                <option value="RUB">RUB</option>
                <option value="SAR">SAR</option>
                <option value="SEK">SEK</option>
                <option value="SGD">SGD</option>
                <option value="THB">THB</option>
                <option value="TRY">TRY</option>
                <option value="TWD">TWD</option>
                <option value="UAH">UAH</option>
                <option value="UYU">UYU</option>
                <option value="ZAR">ZAR</option>

            </select><br>

        </label><br>

        <input type="submit" name="submit" />
<?php

if (isset($_POST['submit'])) {

    $amt = $_POST['amt'];
    // $fromCur=$_POST['fromcur'];

    $toCur = $_POST['toCur'];

    $url = "http://api.exchangeratesapi.io/v1/latest?access_key=6974e05c1c1a78bea45ce81722297eb4&format=1&base=$fromCur&symbols=$toCur";
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_URL, $url);

    $result = curl_exec($ch);

    curl_close($ch);

    $result = json_decode($result, true);

    $final_amt = $result['rates'][$toCur];

    // echo "<pre>";

    // print_r($result);
    $a=$amt*$final_amt;
    echo $amt * $final_amt;


    // print_r($final_amt);

    // echo $amt;

    // echo $toCur;
    $connection =mysqli_connect("localhost","root","Gamechanger1234","shubhu_db");
    if(!$connection){
        die("could not connect".mysqli_connect_error());
    }
    // $timestamp=date('Y-m-d H:i:s');

    $query ="INSERT INTO shubhu_db.currencytable (EnterAmount,From1,To1,TargetAmt) VALUES($amt,'$fromCur','$toCur',$a)";
    $stmt =mysqli_query($connection,$query);

}

?>

    </form>
</body>
</html>
