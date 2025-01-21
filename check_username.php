<?php
include_once 'connection.php';

if (isset($_GET['username'])) {
  $username = $_GET['username'];

  $sql = "SELECT COUNT(*) AS count FROM account WHERE Username = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->bind_result($count);
  $stmt->fetch();
  $stmt->close();

  echo json_encode(['exists' => $count > 0]);
}
?>
