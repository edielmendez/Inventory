<?php 

class Queja{
	// database connection and table name
    private $conn;
    private $table_name = "queja";
      
    // object properties
    public $id;
    public $nombre;
    public $telefono;
    public $email;
    public $queja;
    public $fecha;
    
 

	function __construct($db)
	{
		# code...	
		$this->conn = $db;
	}

	// read all softwares
	function readAll(){

		// select all query
		$query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";

		// prepare query statement
		$stmt = $this->conn->prepare( $query );
		
		// execute query
		$stmt->execute();
		
		return $stmt;
	}

	function create(){
	     
	    // query to insert record
	    $query = "INSERT INTO  $this->table_name SET nombre=:nombre, telefono=:telefono, email=:email, queja=:queja, fecha=:fecha";
	     
	    // prepare query
	    $stmt = $this->conn->prepare($query);
	 
	    // posted values
	    
	    
	   
	    $this->nombre=htmlspecialchars(strip_tags($this->nombre));
	    $this->telefono=htmlspecialchars(strip_tags($this->telefono));
	    $this->email=htmlspecialchars(strip_tags($this->email));
	    $this->queja=($this->queja);
	    $this->fecha=htmlspecialchars(strip_tags($this->fecha));
	
	  



	 
	    // bind values
	    $stmt->bindParam(":nombre", $this->nombre);
	    $stmt->bindParam(":telefono", $this->telefono);
	    $stmt->bindParam(":email", $this->email);
	    $stmt->bindParam(":queja", $this->queja);
	    $stmt->bindParam(":fecha", $this->fecha);




	   /* print_r($stmt->bindParam());
	    return;*/

	     
	    // execute query
	    if($stmt->execute()){
	        return true;
	    }else{
	        echo "<pre>";
	            print_r($stmt->errorInfo());
	        echo "</pre>";
	 
	        return false;
	    }
	}

	// delete the software
	function delete(){
	 
	    // delete query
	    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
	     
	    // prepare query
	    $stmt = $this->conn->prepare($query);
	     
	    // bind id of record to delete
	    $stmt->bindParam(1, $this->id);
	 
	    // execute query
	    if($stmt->execute()){
	        return true;
	    }else{
	        return false;
	    }
	}
	
}

 ?>
