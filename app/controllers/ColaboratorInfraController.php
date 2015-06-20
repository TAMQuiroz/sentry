<?php

class ColaboratorInfraController extends \BaseController {

	public function home()
    {
		   
    	$requirements = Requirement::where('role', 3)->where('status', 0)->orWhere('status', 1)->get();

    	$data = array(
    		'reqs'	=>	$requirements
    	);
    	return View::make('colaborator.infraestructure.home', $data);
    }

    public function updateReqs(){
    	$input = Input::all();
    	unset($input['_token']);
    	foreach($input as $key => $value){	
			$requirement = Requirement::where('id',$key)->first();
            if($value == 1 || $value == 2) $requirement->initDate = date('Y-m-d');
			$requirement->status = $value;
			$requirement->save();
            $this->checkFinish($requirement->formID);
    	}
    		
    	return Redirect::to('/colaborator/infra/home');
    }

    public function search(){
    	
    	$input = Input::all();

		if(isset($input['filter'])){
            $requirements = Requirement::where('role', 3)->where('status', $input['filter'])->get();
            $filter = $input['filter'];
        }
        else
        {
            $requirements = Requirement::where('role', 3)->where('status', 0)->get();
            unset($input['_token']);
            foreach($input as $key => $value){
                            
                $requirement = Requirement::where('id',$key)->first();
                if($value == 1 || $value == 2) $requirement->initDate = date('Y-m-d');
                $requirement->status = $value;
                $requirement->save();
            }
            $filter = 0;
        }

        $data = array (
            'reqs' => $requirements,
            'filter'    => $filter
        );
        return View::make('colaborator.infraestructure.home', $data);
    }

    public function checkFinish($formId)
    {
        $check = 1;
        $reqs = Requirement::where('formID', $formId)->get();
        foreach ($reqs as $req) {
            if ($req->status != 2)
            {
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