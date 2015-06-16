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

    	
    	die();
    }
}

