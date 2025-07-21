<?php
function get_var($key, $default = "")
{
    if (isset($_POST[$key])) {
        return $_POST[$key];
    }
    return $default;
}
function get_select($key, $value)
{
    if (isset($_POST[$key])) {
        if ($_POST[$key] == $value) {
            return "selected";
        }
    }
    return "";
}
function esc($var)
{
    return htmlspecialchars($var);
}

// Random string to crete users and school IDs
function random_string($length)
{
    $array = array_merge(
        range(0, 9),
        range('a', 'z'),
        range('A', 'Z')
    );
    $text = "";
    for ($x = 0; $x < $length; $x++) {
        $random = rand(0, 61);
        $text .= $array[$random];
    }
    return $text;
}

// data format
function get_date($date)
{
	return date("jS M, Y",strtotime($date));
}

function show($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

// function get_image($image, $gender = 'male')
// {
//     $default = ($gender == 'male')
//         ? ROOT . '/assets/img/user/user-1.png'
//         : ROOT . '/assets/img/user/user-02.jpg';

//     if (!empty($image) && is_string($image)) {
//         $imagePath = 'uploads/images/' . $image;

//         if (file_exists('public/' . $imagePath)) {
//             return ROOT . '/' . $imagePath;
//         }
//     }

//     return $default;
// }

function get_image($image, $gender = 'male')
{
    // Check if image path is not empty and is a valid string before calling file_exists
    if (!empty($image) && is_string($image) && file_exists($image)) {
        $class = new Image();
        return ROOT . "/" . $class->profile_thumb($image) ;
    }

    // Set default image based on gender
    return ASSETS . ($gender == 'male' ? '/user-1.png' : '/user-02.jpg');
}


function views_path($view)
{
	if(file_exists("../private/views/" . $view . ".inc.php"))
	{
		return ("../private/views/" . $view . ".inc.php");
	}else{
		return ("../private/views/404.view.php");
	}
}
function upload_image($FILES)
{
	if(count($FILES) > 0)
	{

		//we have an image || Image allowed
		$allowed[] = "image/jpeg";
		$allowed[] = "image/png";

		if($FILES['image']['error'] == 0 && in_array($FILES['image']['type'], $allowed))
		{
			$folder = "uploads/";
			if(!file_exists($folder)){
				mkdir($folder,0777,true);
			}
			$destination = $folder . time() . "_" . $FILES['image']['name'];
			move_uploaded_file($FILES['image']['tmp_name'], $destination);
			return $destination;
		}
		
	}

	return false;
}

function has_taken_test($test_id)
{

	return "No";
}

function can_take_test($my_test_id)
{
	$class = new Classes_model();
	$mytable = "class_students";
	if(Auth::getRank() != "student"){
		return false;
	}
	
	$query = "SELECT * from $mytable where user_id = :user_id && disabled = 0";
	$data['stud_classes'] = $class->query($query,['user_id'=>Auth::getUser_id()]);

	$data['student_classes'] = array();
	if($data['stud_classes']){
		foreach ($data['stud_classes'] as $key => $arow) {
			// code...
			$data['student_classes'][] = $class->first('class_id',$arow->class_id);
		}
	}

	//collect class id's
	$class_ids = [];
	foreach ($data['student_classes'] as $key => $class_row) {
		// code...
		$class_ids[] = $class_row->class_id;
	}
	
	$id_str = "'" . implode("','", $class_ids) . "'";
	$query = "SELECT * from tests where class_id in ($id_str)";

	$tests_model = new Tests_model();
	$tests = $tests_model->query($query);

	$my_tests = array_column($tests, 'test_id');
	if(in_array($my_test_id, $my_tests)){
		return true;
	}
	return false;
}

//function can_take_test($my_test_id)
// {
//     $class = new Classes_model();
//     $mytable = "class_students";

//     if (Auth::getRank() != "student") {
//         return false;
//     }

//     // Get all student active classes
//     $query = "SELECT * FROM $mytable WHERE user_id = :user_id AND disabled = 0";
//     $stud_classes = $class->query($query, ['user_id' => Auth::getUser_id()]);

//     if (!$stud_classes) {
//         return false;
//     }

//     $student_classes = [];
//     foreach ($stud_classes as $row) {
//         $class_data = $class->first('class_id', $row->class_id);
//         if ($class_data) {
//             $student_classes[] = $class_data;
//         }
//     }

//     $class_ids = array_column($student_classes, 'class_id');

//     if (empty($class_ids)) {
//         return false;
//     }

//     $id_str = "'" . implode("','", $class_ids) . "'";
//     $query = "SELECT * FROM tests WHERE class_id IN ($id_str)";

//     $tests_model = new Tests_model();
//     $tests = $tests_model->query($query);

//     $my_tests = array_column($tests, 'test_id');

//     return in_array($my_test_id, $my_tests);
// }
