<?php

require_once 'dbclass2.php'; 

$crud = new Crud();

if(isset($_GET['id'])) {
  
  $userId = $_GET['id'];

  $user = $crud->get('user', '*', "id = $userId")[0]; 

} 

if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $userName = $_POST['userName'];
  $email = $_POST['email'];

  $result = $crud->update('user', [
    'userName' => $userName,
    'email' => $email
  ], "id = $userId");

  if($result) {
    header('Location: index.php');
  } else {
    echo "Update failed: " ;
  }

}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container">

  <h1>Edit User</h1>

  <form method="POST" action="">

    <div class="form-group">
      <label>User Name</label>
      <input value="<?php echo $user['userName']; ?>" type="text" name="userName" class="form-control">
    </div>

    <div class="form-group">
      <label>Email</label>    
      <input value="<?php echo $user['email']; ?>" type="email" name="email" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
  
  </form>

</div>

</body>
</html>