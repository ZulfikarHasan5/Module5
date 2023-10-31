<?php

// Get user credentials from form
$email = $_POST['email'];
$password = $_POST['password'];

// Check if user exists
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  $user = $result->fetch_assoc();

  // Verify password
  if (password_verify($password, $user['password'])) {
    // Set session variables
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    // Redirect to appropriate page based on user role
    if ($user['role'] === 'admin') {
      header('Location: admin.php');
    } else if ($user['role'] === 'manager') {
      header('Location: manager.php');
    } else {
      header('Location: user.php');
    }
  } else {
    // Display error message
  }
} else {
  // Display error message
}

?>
