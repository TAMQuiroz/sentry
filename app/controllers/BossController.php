<?php

class BossController extends \BaseController {

	public function home()
    {
    		$user = Auth::user();

			$forms = DB::table('form')->where('status', 1)->where('statusEnd',0)->get();

	        $dataParent = array();

	        if($forms)
	        {
	        	foreach ($forms as $form) {
	        		$employee = DB::table('employees')->where('id', $form->employeeID)->first();
	        		$dataChild = array(
		        	'name'		=>	$employee->name,
		        	'lastName'	=>	$employee->lastname,
		        	'formID'	=>	$form->id,
		        	'date'		=>	$form->updated_at,
		        	'status'	=>	$form->status,
		        	'statusEnd'	=>	$form->statusEnd
		        	);
		        	array_push($dataParent,$dataChild);
	        	}
		        

				$data = array ('data' => $dataParent);
			}
			else
			{
				$data = array ('data' => null);
			}
	        return View::make('boss.home', $data);
    }
}