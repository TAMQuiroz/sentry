<?php

class EnablerController extends \BaseController {
	public function home()
    {

		$reqs = Requirement::where('status', 0)->where('role',5)->get();
		$dataParent = array();
		$idAnterior = 0;
		foreach ($reqs as $req) {
			$employee = Employee::where('id',$req->employeeID)->first();
			$areaEmpl = Area::where('id',$employee->area_id)->first();
			if ($idAnterior != $employee->id) {
				$idAnterior = $employee->id;
				$dataChild = array(
					'employee' => $employee,
					'area' => $areaEmpl,
					'req' => $req,
					'formID' => $req->formID
				);			
				array_push($dataParent,$dataChild);	
			}
			
		}
		
		$data = array('data' => $dataParent);
		return View::make('enabler.home', $data);
    }	

    public function showReqs($formId ){
    	$reqs = Requirement::where('formID', $formId)->where('role',5)->get();
    	foreach ($reqs as $req) {
    		$employee = Employee::where('id',$req->employeeID)->first();
    		break;
    	}
    	$dataChild = array(
    		'employee' => $employee,
    		'reqs' => $reqs,
    	);

    	$dataParent = array();
    	array_push($dataParent, $dataChild);

    	$data = array(
    		'data' => $dataParent,
    		'formId' => $formId
    	);
    	return View::make('enabler.requirementPerson',$data);
    }

    public function updateReq(){
    	$input = Input::all();
    	unset($input['_token']);
    	var_dump($input);
    	foreach ($input as $key => $value) {
    		$reqs = Requirement::where('formID', $input['formID'])->where('role',5)->where('SAPType',$value)->first();
    		//var_dump($value);
    		//die();
            //aqui esta lo q no salia de value
    		//$reqs->goodCheck = $value;
    		$reqs->status = 1;
    		var_dump($reqs);
    		//$reqs->save();
    	}
    	die();

    	return Redirect::to('/enabler/home');
    }
}

