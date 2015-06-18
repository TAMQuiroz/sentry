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
    	}
    		
    	return Redirect::to('/colaborator/infra/home');
    }

    public function search(){
    	
    	$input = Input::all();

		if(isset($input['filter'])){
            $requirements = Requirement::where('role', 3)->where('status', $input['filter'])->get();
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
        }

        $data = array (
            'reqs' => $requirements
        );
        return View::make('colaborator.infraestructure.home', $data);
    }
}