<?php

class ColaboratorInfraController extends \BaseController {

	public function home()
    {
		   
    	$requirements = Requirement::where('role', 3)->get();

    	$data = array(
    		'reqs'	=>	$requirements

    	);
    	return View::make('colaborator.infraestructure.home', $data);
    }

    public function updateReqs(){
    	$input = Input::all();
    	
    	foreach($input as $key => $value){
			var_dump($key." ".$value);
			die();
			$requirement = Requirement::where('id',$key)->first();
			$requirement->status = $value;
			die();
			$requirement->save();
    	}
    		
    	die();

    	return Redirect::to('/colaborator/infra/home');
    }

    public function search(){
    	die();
    	$input = Input::all();


		$reqs = Requirement::where('status', $input['filter'])->get();

        $dataParent = array();

        if($forms)
        {
        	foreach ($forms as $form) {
        		$requirement = Requirement::where('id', $requirement->formID)->first();
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