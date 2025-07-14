<?php
//Students Controller

class Students extends Controller
{
	
	function index()
	{
		// code...
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$user = new User();
 		$school_id = Auth::getSchool_id();
 		
 		$limit = 10;
 		$pager = new Pager($limit);
 		$offset = $pager->offset;

 		$query = "SELECT * from users where school_id = :school_id && ranks in ('student') order by id desc limit $limit offset $offset";
 		$arr['school_id'] = $school_id;

 		if(isset($_GET['find']))
 		{
 			$find = '%' . $_GET['find'] . '%';
 			$query = "SELECT * from users where school_id = :school_id && ranks in ('student') && (first_name like :find || last_name like :find) order by id desc limit $limit offset $offset";
 			$arr['find'] = $find;
 		}

		$data = $user->query($query,$arr);

		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['students','students'];

		if(Auth::access('reception')){
			$this->view('students',[
				'rows'=>$data,
				'crumbs'=>$crumbs,
				'pager'=>$pager,
			]);
		}else{
			$this->view('access-denied');
		}
	}
}