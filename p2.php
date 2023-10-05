<?php
$db=new mysqli('localhost','root','Gamechanger1234','project');
$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$pin_code = $_POST['pincode'];

$stmt = $conn->prepare("INSERT INTO personal_info (first_name, last_name, address, contact, pin_code) VALUES ('first_name','last_name','address','contact','pin_code')");

?>



<?php
        // api key =AIzaSyDt7F7Sx2FkGpEMte5yptAkQLktNqwkaW8
        $url="https://www.googleapis.com/customsearch/v1?key=AIzaSyDt7F7Sx2FkGpEMte5yptAkQLktNqwkaW8&cx=017576662512468239146:omuauf_lfve&q=cars&callback=hndlr";
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
        curl_setopt($ch, CURLOPT_URL, $url);
    
        $result = curl_exec($ch);
    
        curl_close($ch);
    
        $result = json_decode($result, true);




    
        
        
        ?>



<!-- this code is used in  p3.php -->
<?php
$connection =mysqli_connect("localhost","root","Gamechanger1234","shubhu_db");
$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$address = $_POST['address1'];
$contact = $_POST['contact'];
$pin_code = $_POST['pincode'];
if(!$connection){
        die("could not connect".mysqli_connect_error());
}
$query ="INSERT INTO shubhu_db.personal_info (first_name,last_name,address1,contact,pin_code) VALUES('$first_name','$last_name','$address',$contact,'$pin_code')";
$stmt =mysqli_query($connection,$query);
?>