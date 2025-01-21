<?php
include 'connection.php'; // Add the semicolon here

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];

$sql = "INSERT INTO feedback (name, email, feedback) VALUES ('$name', '$email', '$feedback')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Thank you for your feedback!');
            window.location.href = 'contactus.php';
          </script>";
} else {
    echo "<script>
            alert('Error: " . $sql . "<br>" . $conn->error . "');
            window.location.href = 'contactus.php';
          </script>";
}

$conn->close();
?>
