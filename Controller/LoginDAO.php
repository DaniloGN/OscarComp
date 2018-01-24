<?php
  class LoginDAO{
    private $con;

     public function __construct($con) {
      $this->con = $con;
    }
    public function load($fields="*",$add=""){
      if(strlen($add)>0) $add = " ".$add;
      $sql = "SELECT ".$fields." FROM login".$add;
      $result= mysqli_query($this->con, $sql);
      return $result;
    }

    public function insert($fields,$params=null){
      $sql = "INSERT INTO login (".$fields.") VALUES (".$params.")";
      echo $sql."<br>\n";
      $result = mysqli_query($this->con, $sql);
      return $result;
    }
    
    public function update($fields,$params=null,$where=null){
        $sql = "UPDATE login SET ( ".$fields." = ".$params" )";
        if(isset($where)) $sql ." WHERE ".$where;
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    
    public function delete($where=null,$params=null){
        $sql = "DELETE FROM login";
        if(isset($where)) $sql ." WHERE " .$where. " = ".$params;
         $result = mysqli_query($this->con, $sql);
        return $result;
    }
  }
?>
