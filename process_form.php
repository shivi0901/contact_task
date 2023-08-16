<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

// Database connection
$host = 'localhost';
$db_user = 'root'; // MySQL User Name
$db_password = 'shivi0901'; // MySQL Password
$db_name = 'contact_form_db';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Form data
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Insert data into database
    $client_ip = $_SERVER['REMOTE_ADDR'];
    $sql = "INSERT INTO contact_form (full_name, phone, email, subject, message, ip_address, timestamp) 
            VALUES (:full_name, :phone, :email, :subject, :message, :client_ip, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':client_ip', $client_ip);
    $stmt->execute();

    // Send email notification using PHPMailer
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'shivani.mishra0901@gmail.com'; // Your Gmail address
    $mail->Password = 'nqxbymvldozfjzot'; // Your Gmail password or app-specific password
    $mail->SMTPSecure = 'tls'; // Use TLS encryption
    $mail->Port = 587; // TLS port
    $mail->setFrom($email, $full_name);
    $mail->addAddress('test@techsolvitservice.com'); // Destination email address
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->send();

    echo "Data inserted and email sent successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>
