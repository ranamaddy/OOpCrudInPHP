<?php

class Crud {

  private $db;

  public function __construct() {
    $this->connect(); 
  }
  
  private function connect() {
    $this->db = new mysqli('localhost', 'root', '', 'student');

    if($this->db->connect_error) {
      die("Connection failed: " . $this->db->connect_error);
    } 
  }

  public function get($table, $rows = '*', $where = null , $join = null, $order = null, $limit = null) {

    $sql = "SELECT $rows FROM $table";
    if($join !== null) {
      $sql .= " JOIN $join";
    }
    if($where !== null) {
      $sql .= " WHERE $where";
    }
    if($order !== null) {  
      $sql .= " ORDER BY $order";
    }
    if($limit !== null) {
      $sql .= " LIMIT $limit";
    }

    $query = $this->db->query($sql);

    if($query->num_rows > 0) {
      while($row = $query->fetch_assoc()) {
        $result[] = $row;
      }
      return $result;
    }
    
    return false;
  }

  public function insert($table, $data) {
    $fields = implode(',', array_keys($data));
    $values = implode(',', array_map(function($value) {
      return "'".$this->db->real_escape_string($value)."'"; 
    }, array_values($data)));
    
    $sql = "INSERT INTO $table ($fields) VALUES ($values)";
    
    if($this->db->query($sql)) {
      return $this->db->insert_id;
    }
    
    return false;
  }

  // check value is availbe or not 

  public function checkUserExists($email) {

    $result = $this->db->query("SELECT id FROM users WHERE email='$email' LIMIT 1");
  
    if($result->num_rows > 0) { 
      return true;
    }
  
    return false;
  
  }

  // Update, delete methods...


// ...Rest of Crud class 

public function update($table, $data, $where){

    $updateValues = [];
  
    foreach ($data as $key => $value) {
      $updateValues[] = "$key = '".$this->db->real_escape_string($value)."'"; 
    }
  
    $updateString = implode(',', $updateValues);
  
    $sql = "UPDATE $table SET $updateString WHERE $where";
  
    if($this->db->query($sql)) {
      return true;
    }  
  
    return false;
  }
  
  public function delete($table, $where = null) {
  
    if($where === null) {
      $sql = "DELETE FROM $table";
    } else {
      $sql = "DELETE FROM $table WHERE $where";
    }
  
    if($this->db->query($sql)) {
      return true;
    }
  
    return false;   
  }



}



?>