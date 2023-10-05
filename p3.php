<?php

            $connection =mysqli_connect("localhost","root","Gamechanger1234","shubhu_db");
            $first_name = $_POST['fname'];
            $last_name = $_POST['lname'];
            $address = $_POST['address1'];
            $contact = $_POST['contact'];
            $pin_code = $_POST['pincode'];
            $url="https://www.googleapis.com/customsearch/v1?key=AIzaSyAq5e69aOVHpEBVNU6956kwbxhv66ChMO0&cx=c21e0f89b47954bf3&q=$first_name";        
            $ch = curl_init();
        
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
            curl_setopt($ch, CURLOPT_URL, $url);
        
            $result = curl_exec($ch);
        
            $result = json_decode($result, true);
            echo var_dump($result);
            curl_close($ch);

        if(!$connection){
            die("could not connect".mysqli_connect_error());
        }
    
        $query ="INSERT INTO shubhu_db.personal_info (first_name,last_name,address1,contact,pin_code) VALUES('$first_name','$last_name','$address',$contact,'$pin_code')";
        $stmt =mysqli_query($connection,$query);
    
        ?>
        
