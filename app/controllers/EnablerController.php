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

    public function search()
    {

        $input = Input::all();

        $reqs = Requirement::where('status', $input['filter'])->where('role',5)->get();
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

    public function showReqs($formId)
    {
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

    public function updateReq()
    {
    	$input = Input::all();
    	unset($input['_token']);
    	
    	foreach ($input as $key => $value) {
    		$req = Requirement::where('id', $key)->first();
    		//aqui esta lo q no salia de value
    		$req->goodCheck = $value;
    		$req->status = 2;
    		$req->initDate = date('Y-m-d');
    		$req->save();
            $this->checkFinish($req->formID);
    	}
    	return Redirect::to('/enabler/home');
    }

    public function checkFinish($formId)
    {
        $check = 1;
        $reqs = Requirement::where('formID', $formId)->get();
        foreach ($reqs as $req) {
            var_dump("Status".$req->status." check ".$check);
            if ($req->status != 2)
            {
                var_dump("entro a fallo");
                $check = 0;
                break;
            }
        }
        if($check == 1){

            $form = Forms::where('id',$formId)->first();
            $form->statusEnd = 1;
            $form->save();
        }
    }
}

