<?php

// change school controller
// echo "<pre>";
class Switch_school extends Controller
{
    function index($id = '')
    {
        // if (Auth::switch_school($id)) {
        //     // echo "School switched successfully.";
        // } else {
        //     echo "Failed to switch school.";
        //     exit;
        // }
        // code...
		if(Auth::access('super_admin')){
			Auth::switch_school($id);
		}

        $this->redirect('schools');
    }
}
