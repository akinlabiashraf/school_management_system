<?php
class Database
{
    private function connect()
    {
        $string = DBDRIVER . ":host=" . DBHOST . "; dbname=" . DBNAME;
        if (!$conn = new PDO($string, DBUSER, DBPASSWORD)) {
            die("could not access the database");
        }
        return $conn;
    }
   public function query($query,$data = array(),$data_type = "object")
	{

		$con = $this->connect();
		$stmt = $con->prepare($query);

		$result = false;
		if($stmt){
			$check = $stmt->execute($data);
			if($check){
				if($data_type == "object"){
					$result = $stmt->fetchAll(PDO::FETCH_OBJ);
				}else{
					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
 
 			}
		}

		//run functions after select
		if(is_array($result)){
			if(property_exists($this, 'afterSelect'))
			{
				foreach($this->afterSelect as $func)
				{
					$result = $this->$func($result);
				}
			}
		}

		if(is_array($result) && count($result) >0){
			return $result;
		}

		return false;
	}
}
