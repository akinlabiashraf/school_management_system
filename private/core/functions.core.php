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
