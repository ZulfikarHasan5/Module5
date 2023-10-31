php

 Validate form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($username)  empty($email)  empty($password)) {
   Display error message
} else {
   Check if username and email are already in use
  $sql = SELECT  FROM users WHERE username = '$username' OR email = '$email';
  $result = mysqli_query($conn, $sql);

  if ($result-num_rows  0) {
     Display error message
  } else {
     Hash password
    $password = password_hash($password, PASSWORD_DEFAULT);

     Insert new user into database
    $sql = INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password');
    mysqli_query($conn, $sql);

     Redirect to login page
    header('Location login.php');
  }
}


