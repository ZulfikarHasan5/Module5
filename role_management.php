<?php
// Only allow admins to access this page
if ($_SESSION['role'] !== 'admin') {
  header('Location: index.php');
}

// Get all user roles from database
$sql = "SELECT * FROM roles";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Role Management</title>
</head>
<body>
  <h1>Role Management</h1>

  <table border="1">
    <thead>
      <tr>
        <th>Role ID</th>
        <th>Role Name</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td><a href="edit_role.php?id=' . $row['id'] . '">Edit</a> | <a href="delete_role.php?id=' . $row['id'] . '">Delete</a></td>';
        echo '</tr>';
      }
      ?>
    </tbody>
  </table>

  <a href="create_role.php">Create New Role</a>
</body>
</html>
