<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'];
    
    // Clean the inputs for SQL insertion
    $full_name = str_replace("'", "''", $full_name);
    $email = str_replace("'", "''", $email);
    $phone = str_replace("'", "''", $phone);
    $subject = str_replace("'", "''", $subject);
    $message = str_replace("'", "''", $message);
    
    // Check if this email already exists in the SQL file
    $sql_file = 'contact_data.sql';
    $file_content = file_exists($sql_file) ? file_get_contents($sql_file) : '';
    
    // Check if email already exists
    if (strpos($file_content, "'$email'") !== false) {
        echo "<script>alert('You have already submitted a message!'); window.location.href='index.html';</script>";
        exit;
    }
    
    // Format the current timestamp
    
    $timestamp = date('Y-m-d H:i:s');
    
    // Create SQL insert statement
    $sql_insert = "-- Submission on $timestamp\n";
    $sql_insert .= "INSERT INTO contact (full_name, email, phone, subject, message, submitted_at) VALUES ('$full_name', '$email', '$phone', '$subject', '$message', '$timestamp');\n\n";
    
    // Append to the SQL file
    file_put_contents($sql_file, $sql_insert, FILE_APPEND | LOCK_EX);
    
    echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
} else {
    echo "<script>alert('Error: Invalid request!'); window.location.href='index.html';</script>";
}
?>