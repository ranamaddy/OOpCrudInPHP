<?php

require_once 'dbclass2.php';

$crud = new Crud();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $userName = $_POST['userName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $result = $crud->insert('user', [
    'userName' => $userName, 
    'email' => $email,
    'password' => $password
  ]);

  if($result){
    header('Location: index.php');
  }else {
    echo "Insert failed: ";
  }

}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Create User</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container">

  <h1>Create User</h1>

  <form method="POST" action="">
  
    <div class="form-group">
      <label>User Name</label>
      <input type="text" name="userName" class="form-control">
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control">
    </div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  
  </form>

</div>

</body>
</html>