<?php

class ColaboratorInfraController extends \BaseController {

	public function home()
    {$user = Auth::user();

			$forms = DB::table('form')->where('status', 0)->get();

	        $dataParent = array();

	        if($forms)
	        {
	        	foreach ($forms as $form) {
        		$requirement = DB::table('requirement')->where('id', $requirement->formID)->first();
        		$dataChild = array(
	        	'requirementID'		=>	$requirement->formID,
	        	'name'	=>	$requirement->name,
	        	'posicion'	=>	$requirement->limitDate,
	        	'limitDate'		=>	$requirement->limitDate,
	        	'status'	=>	$form->status,
	        	);
	        	array_push($dataParent,$dataChild);
        	}
		        

				$data = array ('data' => $dataParent);
			}
			else
			{
				$data = array ('data' => null);
			}
	       
    	return View::make('colaborator.infraestructure.home',$data);
    }
    public function search(){
    	$input = Input::all();


		$forms = DB::table('form')->where('status', $input['filter'])->get();

        $dataParent = array();

        if($forms)
        {
        	foreach ($forms as $form) {
        		$requirement = DB::table('requirement')->where('id', $requirement->formID)->first();
        		$dataChild = array(
	        	'requirementID'		=>	$requirement->formID,
	        	'name'	=>	$requirement->name,
	        	'posicion'	=>	$requirement->limitDate,
	        	'limitDate'		=>	$requirement->limitDate,
	        	'status'	=>	$form->status,
	        	);
	        	array_push($dataParent,$dataChild);
        	}
	        

			$data = array ('data' => $dataParent);
		}
		else
		{
			$data = array ('data' => null);
		}
        return View::make('businessPartner.home', $data);
    }
}