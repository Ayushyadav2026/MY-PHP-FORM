<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['student_email'];

// check duplicate email
$check = "SELECT * FROM workshop_data WHERE student_email='$email'";
$result = mysqli_query($conn, $check);

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Email already registered!'); window.history.back();</script>";
    exit();
}
    $sql = "INSERT INTO workshop_data 
    (college_name, workshop_date, college_address, student_name, student_phone, student_email, course) 
    VALUES 
    ('".$_POST['college_name']."', '".$_POST['workshop_date']."', '".$_POST['college_address']."', 
     '".$_POST['student_name']."', '".$_POST['student_phone']."', '".$_POST['student_email']."', '".$_POST['course']."')";

    if (mysqli_query($conn, $sql)) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <style>
        body {
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    font-family: Arial;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    padding: 15px;
}

.card {
    background: white;
    padding: 25px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    
    width: 100%;
    max-width: 400px;   /* 👈 ye important hai */
}

h2 {
    color: #28a745;
    font-size: 22px;
}

p {
    margin: 10px 0;
    font-size: 16px;
}

a {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 20px;
    background: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 6px;
}


@media (max-width: 480px) {
    .card {
        padding: 20px;
    }

    h2 {
        font-size: 18px;
    }

    p {
        font-size: 14px;
    }
}
    </style>
</head>
<body>

<div class="card">
    <h2>🎉 Registration Successful!</h2>
    <p>Thank You For Enrolling ❤️</p>
    <a href="index.php">Go Back</a>
</div>

</body>
</html>

<?php
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
