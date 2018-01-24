<?php
  class InscritoDAO{
    private $con;

    public function __construct($con) {
      $this->con = $con;
    }
      public function load($fields="*",$add=""){
      if(strlen($add)>0) $add = " ".$add;
      $sql = "SELECT ".$fields." FROM inscrito".$add;
      $result= mysqli_query($this->con, $sql);
      return $result;
    }

    public function insert($fields,$params=null){
      $sql = "INSERT INTO inscrito (".$fields.") VALUES (".$params.")";
      echo $sql."<br>\n";
      $result = mysqli_query($this->con, $sql);
      return $result;
    }
  }
?>