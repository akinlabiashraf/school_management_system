<?php

class School extends Model
{

    public function __construct()
    {
        $this->table = "schools";
    }
    protected $allowedColumns = [
        'school',
        'school_description',
        'category',
        'date'
    ];
    protected $beforeInsert = [
        'generate_user_id',
        'generate_school_id'
    ];
    protected $afterSelect = [
        'get_user',
    ];



    public function validate($DATA)
    {

        $this->errors = array();

        if (empty($DATA['school']) || !preg_match("/^[a-z A-Z]+$/", $DATA['school'])) {
            # code...
            $this->errors['school'] = "Only letters allowed in the School name";
        }
        if (empty($DATA['school_description'])) {
            # code...
            $this->errors['school_description'] = "Fill the description column";
        }
        $category = ['institution', 'secondary_school', 'primary_school', 'college'];
        if (empty($DATA['category']) || !in_array($DATA['category'], $category)) {
            # code...
            $this->errors['category'] = "Category not selected";
        }

        if (count($this->errors) == 0) {
            return true;
        }
        return false;
    }

    // to recognize the user that is adding the school
    public function generate_user_id($data)
    {
        if (isset($_SESSION['USER']->user_id)) {
            $data['user_id'] = $_SESSION['USER']->user_id;
        }
        return $data;
    }
    // generate school_id
    public function generate_school_id($data)
    {

        $data['school_id'] = random_string(60);
        return $data;
    }
    // Get user
    public function get_user($data)
    {
        $user = new User();
        foreach ($data as $key => $row) {
            # code...
            $result = $user->where('user_id', $row->user_id); //who creted this row
            $data[$key]->user = is_array($result)? $result[0] : false;
        }
        return $data;
    }
}
