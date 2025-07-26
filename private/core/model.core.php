<?php
class Model extends Database
{
    protected $table;
    public $errors = array();
    public function __construct()
    {
        if (!property_exists($this, 'table')) {
            $this->table = strtolower($this::class) . "s";
        }
    }

    protected function get_primary_key($table)
    {

        $query = "SHOW KEYS from $table WHERE Key_name = 'PRIMARY' ";
        $db = new Database();
        $data = $db->query($query);

        if (!empty($data[0])) {
            return $data[0]->Column_name;
        }
        return 'id';
    }

    public function where($column,$value,$orderby = 'desc',$limit = 10,$offset = 0)
	{

		$column = addslashes($column);
		$primary_key = $this->get_primary_key($this->table);

		$query = "select * from $this->table where $column = :value order by $primary_key $orderby limit $limit offset $offset";
		$data = $this->query($query,[
			'value'=>$value
		]);

		//run functions after select
		if(is_array($data)){
			if(property_exists($this, 'afterSelect'))
			{
				foreach($this->afterSelect as $func)
				{
					$data = $this->$func($data);
				}
			}
		}

		return $data;
	}

	public function first($column,$value,$orderby = 'desc')
	{

		$column = addslashes($column);
		$primary_key = $this->get_primary_key($this->table);

		$query = "SELECT * from $this->table where $column = :value order by $primary_key $orderby";
		$data = $this->query($query,[
			'value'=>$value
		]);

		//run functions after select
		if(is_array($data)){
			if(property_exists($this, 'afterSelect'))
			{
				foreach($this->afterSelect as $func)
				{
					$data = $this->$func($data);
				}
			}
		}

		if(is_array($data)){
			$data = $data[0];
		}
		return $data;
	}
    public function insert($data)
	{

		//remove unwanted columns
		if(property_exists($this, 'allowedColumns'))
		{
			foreach($data as $key => $column)
			{
				if(!in_array($key, $this->allowedColumns))
				{
					unset($data[$key]);
				}
			}

		}

		//run functions before insert
		if(property_exists($this, 'beforeInsert'))
		{
			foreach($this->beforeInsert as $func)
			{
				$data = $this->$func($data);
			}
		}

		$keys = array_keys($data);
		$columns = implode(',', $keys);
		$values = implode(',:', $keys);

		$query = "INSERT into $this->table ($columns) values (:$values)";

		return $this->query($query,$data);
	}

    public function update($id,$data)
	{
		//remove unwanted columns
		if(property_exists($this, 'allowedColumns'))
		{
			foreach($data as $key => $column)
			{
				if(!in_array($key, $this->allowedColumns))
				{
					unset($data[$key]);
				}
			}

		}

		//run functions before insert
		if(property_exists($this, 'beforeUpdate'))
		{
			foreach($this->beforeUpdate as $func)
			{
				$data = $this->$func($data);
			}
		}

		$str = "";
		foreach ($data as $key => $value) {
			// code...
			$str .= $key. "=:". $key.",";
		}

		$str = trim($str,",");
 
		$data['id'] = $id;
		$query = "UPDATE $this->table set $str where id = :id";

		// show($query);

		return $this->query($query,$data);
	}

    public function delete($id)
    {

        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $data['id'] = $id;
        return $this->query($query, $data);
    }
    // public function email_exist($email)
    // {
    //     $query = "SELECT email FROM {$this->table} WHERE email = :email";
    //     // $query = "DELETE FROM {$this->table} WHERE id = :id";
    //     $data['email'] = $email;
    //     if ($query > 0) {
    //         return false;
    //     }else{
    //         function insert_email($data)
    // {
    //     $keys = array_keys($data);

    //     // Wrap column names in backticks
    //     $email = [];
    //     $values = $data['email'];
    //     $query = "INSERT INTO {$this->table} ($email) VALUES (:$values)";

    //     return $this->query($query, $data);
    // }
    //     }
    //     // return $this->query($query, $data);
    // }
    // public function findAll($orderby = "desc")
    // {
    //     // echo $this::class;
    //     // if (empty($this->table)) {
    //     //     die("ERROR: Table not set.");
    //     // }
    //     $query = "SELECT * FROM $this->table order by id $orderby";
    //     $data =  $this->query($query);
    //     // run function after select
    //     if (is_array($data)) {
    //         # code...
    //         if (property_exists($this, 'afterSelect')) {
    //             foreach ($this->afterSelect as $func) {
    //                 $data = $this->$func($data);
    //             }
    //         }
    //     }
    //     return $data;
    // }

    public function findAll($orderby = 'desc')
	{

		$primary_key = $this->get_primary_key($this->table);

		$query = "select * from $this->table order by $primary_key $orderby";
		$data = $this->query($query);

		//run functions after select
		if(is_array($data)){
			if(property_exists($this, 'afterSelect'))
			{
				foreach($this->afterSelect as $func)
				{
					$data = $this->$func($data);
				}
			}
		}

		return $data;

	}
}
