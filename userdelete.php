<?php

require_once 'dbclass2.php';

$crud = new Crud();

if(isset($_GET['id'])) {

  $userId = $_GET['id'];

  $result = $crud->delete('user', "id = $userId");
  
  if($result) {
    //header('Location: index.php');
  } else {
    echo "Delete failed: " ;
  }

}

?>

