<?php
// class Delete_schools extends Controller
// {
//     function index($id = 'NULL')
//     {
//         if (!Auth::isloggedin()) {
//             $this->redirect('login');
//         }

//         $school = new School();
       
//         if (count($_POST) > 0) {
           
//                 $school->delete($id);
//                 $this->redirect('schools');
             
//         }

//         $row = $school->where('id', $id);
//         if ($row) {
//             $row = $row[0]; 
//         }


//         echo $this->view('delete_schools', [
//             'row' => $row,
//         ]);
//     }
// }
class Delete_schools extends Controller
{
    function index($id = null)
    {
        if (!Auth::isloggedin()) {
            $this->redirect('login');
        }

        $school = new School();

        // If user submitted the final delete (via GET param or POST)
        if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes' && $id) {
            $school->delete($id);
            $this->redirect('schools');
        }

        // Fetch the school info to display on delete confirmation page
        $row = $school->where('id', $id);
        if ($row) {
            $row = $row[0];
        }
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Schools', 'schools'];
        $crumbs[] = ['Delete', 'delete_schools'];
        echo $this->view('delete_schools', [
            'row' => $row,
            'error' => $crumbs,
        ]);
    }
}
