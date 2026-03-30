<?php
include('db_config.php');
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    // HTML कडून 'gender' नावाचा पॅरामीटर येतोय का ते तपासणे
    $gender = isset($data['gender']) ? $data['gender'] : '';

    // जर जेंडर 'women' नसेल, तर इथेच थांबवणे
    if ($gender !== 'women') {
        echo json_encode(["status" => "error", "message" => "This file is only for Female bookings!"]);
        exit;
    }

    $booking_id = $data['id'];
    $name = mysqli_real_escape_string($conn, $data['name']);
    $email = mysqli_real_escape_string($conn, $data['email']);
    $phone = mysqli_real_escape_string($conn, $data['phone']);
    $staff = mysqli_real_escape_string($conn, $data['staff']);
    $date = $data['date'];
    $time = $data['time'];
    $total = $data['total'];
    
    $services_array = [];
    foreach($data['services'] as $s) {
        $services_array[] = $s['name'];
    }
    $services_list = mysqli_real_escape_string($conn, implode(", ", $services_array));

    // फक्त 'bookings' (Female) टेबलमध्ये डेटा जाईल
    $sql = "INSERT INTO bookings (booking_id, customer_name, email, phone, booking_date, booking_time, specialist, services, total_amount) 
            VALUES ('$booking_id', '$name', '$email', '$phone', '$date', '$time', '$staff', '$services_list', '$total')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "Female booking saved successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
    }
}
mysqli_close($conn);
?>