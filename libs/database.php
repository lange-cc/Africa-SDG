<?php
/**
*
*/


class Database extends PDO
{

	function __construct()
	{
		parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME,DB_USER, DB_PASS);
	}
}

class MySQL {


     public function connection(){
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = 'nilefy';
        try{
        $DB_con = new PDO("mysql:host={$this->host};dbname={$this->database}",$this->username,$this->password);
        $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $DB_con;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

    }

public function Quel($string){
   $stmt = $this->connection()->prepare($string);
   return $stmt;
}

    public function Find($set_table_name,$order){
    $this->table_name=$set_table_name;
   $stmt = $this->connection()->prepare("SELECT * FROM ".$this->table_name." ORDER BY `".$this->table_name."` . ".$order);
   return $stmt;
    }

    public function FindWhere($set_table_name,$query){
    $this->table_name=$set_table_name;
   $stmt = $this->connection()->prepare("SELECT * FROM ".$this->table_name." WHERE ".$query);
   return $stmt;
    }

    public function Fetch($fetch){

       $data = $fetch->fetch(PDO::FETCH_ASSOC);
       return $data;

    }
    public function Display($row,$col){

      extract($row);
      return $row[$col];

    }
     public function Ensert($table,$col,$data){

     $stmt = $this->connection()->prepare("INSERT INTO `".$table."` (".$col.") VALUES (NULL, ".$data.")");

     return $stmt;
    }

     public function DeleteData($table,$id){

     $stmt = $this->connection()->prepare("DELETE FROM `".$table."` WHERE  id = ".$id);

     $stmt->execute();
    }

  public function DeleteWhere($table,$data){

     $stmt = $this->connection()->prepare("DELETE FROM `".$table."` WHERE ".$data);

     $stmt->execute();
    }

    public function Update($table,$value,$where){



   $stmt = $this->connection()->prepare("UPDATE `".$table."` SET  ".$value." WHERE ".$where);

     return $stmt;

}


}

?>
