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
			var_dump($key." ".$value);
			
			$requirement = Requirement::where('id',$key)->first();
			$requirement->status = $value;
			$requirement->save();
    	}
    		
    	return Redirect::to('/colaborator/infra/home');
    }

    public function search(){
    	
    	$input = Input::all();

		$requirements = Requirement::where('role', 3)->where('status', $input['filter'])->get();

        $data = array (
            'reqs' => $requirements
        );
        return View::make('colaborator.infraestructure.home', $data);
    }
}