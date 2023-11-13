<?php
// Include CRUD class
require_once 'dbclass2.php';

// Create connection
$crud = new Crud();

// Get users
$users = $crud->get('user');
?>

<!DOCTYPE html>
<html>
<head>
  <title>CRUD App</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container">  

  <h1>Users</h1>

  <a href="create.php" class="btn btn-success">Create</a>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>  
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($users as $user): ?>
      <tr>
        <td><?php echo $user['userName'] ?></td>
        <td><?php echo $user['email'] ?></td>
        <td>
          <a href="userupdate.php?id=<?php echo $user['id'] ?>" class="btn btn-warning">Edit</a>
          <a href="userdelete.php?id=<?php echo $user['id'] ?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

</body>
</html>