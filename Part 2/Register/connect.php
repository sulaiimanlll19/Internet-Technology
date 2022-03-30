<?php
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if( !empty($email) || !empty($username) || !empty($password) ){

        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "registration";

        // Create Database connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname );

        if(mysqli_connect_error()){
            die('Connection failed : '.mysqli_connect_errno());
        }else{

            $sql = "INSERT INTO users (email, username, password) values($email, $username, $password)";

            if($conn->query($sql)){
                echo "New register succesfully...";
            }else{
                echo "Error : ".$sql ."<br>". $conn->error;
            }
            $conn->close();
            // // prepare statement
            // $stmt = $conn->prepare($SELECT);
            // $stmt->bind_param("s", $email);
            // $stmt->execute();
            // $stmt->bind_result($);
            // $stmt->store_result();
            // $rnum = $stmt->num_rows;

            // if( $rnum == 0 ){
            //     $stmt->close():

            //     $stmt = $conn->prepare($INSERT);
            //     $stmt->bind_param("sss", $email, $username, $password);
            //     // each s represent type of insertion
            //     $stmt->execute();
            //     echo "New register succesfully..."
            // }else{
            //     echo "This email Already registered"
            // }
            // $stmt->close();
            // $stmt->close();
        }
    }else{
        echo "All fields are required";
        die();
    }
?>