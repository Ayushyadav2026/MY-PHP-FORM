<?php
$clg = $_GET['clg'] ?? 'Techno Group Of Institute';
$date = $_GET['date'] ?? '21-02-2026';
$addr = $_GET['addr'] ?? 'Chinhat branch';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop Registration</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-card">
    <div class="header-section">
        <h2>Workshop Registration</h2>
       <div class="input-group">
        <input type="text" value="<?php echo $clg; ?>" readonly>
        <input type="text" value="<?php echo $date; ?>" readonly>
        <input type="text" value="<?php echo $addr; ?>" readonly>
        </div>
    </div>
         <form action="submit.php" method="POST">
        <!-- Hidden Fields -->
        <input type="hidden" name="college_name" value="<?php echo $clg; ?>">
        <input type="hidden" name="workshop_date" value="<?php echo $date; ?>">
        <input type="hidden" name="college_address" value="<?php echo $addr; ?>">

        <!-- Student Input Fields -->
        <div class="input-group">
            <input type="text" name="student_name" placeholder="Full Name" required>
           <input type="text" name="student_phone" placeholder="Phone Number" 
              pattern="[0-9]{10}" title="Enter 10 digit valid phone number" required>
            <input type="email" name="student_email" placeholder="Email Address" required>
            <input type="text" name="course" placeholder="Your Course (e.g. BCA, B.Tech)" required>
        </div>
        
        <button type="submit" class="btn-submit">Submit Details</button>
    </form>
</div>

</body>
</html>
