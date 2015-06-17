<?php

class BossController extends \BaseController {

	public function home()
    {
    		$user = Auth::user();

			$forms = Forms::where('status', 1)->where('statusEnd',0)->get();

	        $dataParent = array();

	        if($forms)
	        {
	        	foreach ($forms as $form) {
	        		$employee = Employee::where('id', $form->employeeID)->first();
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

    public function requirement($formId)
    {
    	$requirements = Requirement::where('formID',$formId)->get();
    	$form = Forms::where('id',$formId)->first();
    	$employee = Employee::where('id',$form->employeeID)->first();

    	$users = User::all();

		$dataParent = array();  
		  	
    	foreach ($users as $user) {
    		
    		$dataChild = array(
    			'name'	=> 	$user->name,
    			'email'	=>	$user->email
    		);
    		$dataParent[$user->role_id] = $dataChild;
    		
    	}
    	
    	$data = array(
    		'requirements'		=>		$requirements,
    		'users'				=>		$dataParent,
    		'employee'			=>		$employee
    	);
    	
    	return View::make('boss.requirement', $data);
    }

    public function search()
    {
    	$input = Input::all();

		$forms = Forms::where('status', 1)->where('statusEnd', $input['filter'])->get();

        $dataParent = array();

        if($forms)
        {
        	foreach ($forms as $form) {
        		$employee = Employee::where('id', $form->employeeID)->first();
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